<?php  namespace Kris\LaravelFormBuilder;

use Illuminate\Contracts\View\Factory as View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

class FormHelper
{

    /**
     * @var View
     */
    protected $view;

    /**
     * @var array
     */
    protected $config;

    /**
     * @var Request
     */
    protected $request;

    /**
     * @var FormBuilder
     */
    protected $formBuilder;

    /**
     * All available field types
     *
     * @var array
     */
    protected static $availableFieldTypes = [
        'text',
        'email',
        'url',
        'tel',
        'search',
        'password',
        'hidden',
        'number',
        'date',
        'textarea',
        'submit',
        'reset',
        'button',
        'file',
        'image',
        'select',
        'checkbox',
        'radio',
        'choice',
        'color',
        'datetime-local',
        'month',
        'range',
        'time',
        'week',
        'entity',
        'form',
        'collection',
        'repeated',
        'static'
    ];

    /**
     * Custom types
     *
     * @var array
     */
    private $customTypes = [];

    /**
     * @param View    $view
     * @param Request $request
     * @param array   $config
     */
    public function __construct(View $view, Request $request, array $config = [])
    {
        $this->view = $view;
        $this->config = $config;
        $this->request = $request;
        $this->loadCustomTypes();
    }

    /**
     * @param string $key
     * @param string $default
     * @return mixed
     */
    public function getConfig($key, $default = null)
    {
        return array_get($this->config, $key, $default);
    }

    /**
     * @return View
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Merge options array
     *
     * @param array $first
     * @param array $second
     * @return array
     */
    public function mergeOptions(array $first, array $second)
    {
        return array_replace_recursive($first, $second);
    }

    /**
     * Get proper class for field type
     *
     * @param $type
     * @return string
     */
    public function getFieldType($type)
    {
        if (!$type || trim($type) == '') {
            throw new \InvalidArgumentException('Field type must be provided.');
        }

        if (array_key_exists($type, $this->customTypes)) {
            return $this->customTypes[$type];
        }

        if (!in_array($type, static::$availableFieldTypes)) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Unsupported field type [%s]. Avaiable types are: %s',
                    $type,
                    join(', ', array_merge(static::$availableFieldTypes, array_keys($this->customTypes)))
                )
            );
        }

        switch($type) {
            case 'select':
                $fieldType = __NAMESPACE__.'\\Fields\\SelectType';
                break;
            case 'textarea':
                $fieldType = __NAMESPACE__.'\\Fields\\TextareaType';
                break;
            case 'button':
            case 'submit':
            case 'reset':
                $fieldType = __NAMESPACE__.'\\Fields\\ButtonType';
                break;
            case 'radio':
            case 'checkbox':
                $fieldType = __NAMESPACE__.'\\Fields\\CheckableType';
                break;
            case 'choice':
                $fieldType = __NAMESPACE__.'\\Fields\\ChoiceType';
                break;
            case 'form':
                $fieldType = __NAMESPACE__.'\\Fields\\ChildFormType';
                break;
            case 'entity':
                $fieldType = __NAMESPACE__.'\\Fields\\EntityType';
                break;
            case 'collection':
                $fieldType = __NAMESPACE__.'\\Fields\\CollectionType';
                break;
            case 'repeated':
                $fieldType = __NAMESPACE__.'\\Fields\\RepeatedType';
                break;
            case 'static':
                $fieldType = __NAMESPACE__.'\\Fields\\StaticType';
                break;
            default:
                $fieldType = __NAMESPACE__.'\\Fields\\InputType';
                break;
        }

        return $fieldType;
    }

    /**
     * Convert array of attributes to html attributes
     *
     * @param $options
     * @return string
     */
    public function prepareAttributes($options)
    {
        if (!$options) {
            return null;
        }

        $attributes = [];

        foreach ($options as $name => $option) {
            if ($option !== null) {
                $name = is_numeric($name) ? $option : $name;
                $attributes[] = $name.'="'.$option.'" ';
            }
        }

        return join('', $attributes);
    }

    /**
     * Add custom field
     *
     * @param $name
     * @param $class
     */
    public function addCustomField($name, $class)
    {
        if (!array_key_exists($name, $this->customTypes)) {
            return $this->customTypes[$name] = $class;
        }

        throw new \InvalidArgumentException('Custom field ['.$name.'] already exists on this form object.');
    }

    /**
     * Load custom field types from config file
     */
    private function loadCustomTypes()
    {
        $customFields = (array) $this->getConfig('custom_fields');

        if (!empty($customFields)) {
            foreach ($customFields as $fieldName => $fieldClass) {
                $this->addCustomField($fieldName, $fieldClass);
            }
        }
    }

    public function convertModelToArray($model)
    {
        if (!$model) {
            return null;
        }

        if ($model instanceof Model) {
            return $model->toArray();
        }

        if ($model instanceof Collection) {
            return $model->all();
        }

        return $model;
    }

    /**
     * Format the label to the proper format
     *
     * @param $name
     * @return string
     */
    public function formatLabel($name)
    {
        if (!$name) {
            return null;
        }

        return ucwords(str_replace('_', ' ', $name));
    }
}
