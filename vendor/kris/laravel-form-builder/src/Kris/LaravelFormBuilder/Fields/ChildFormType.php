<?php  namespace Kris\LaravelFormBuilder\Fields;

use Kris\LaravelFormBuilder\Form;

class ChildFormType extends ParentType
{

    /**
     * @var Form
     */
    protected $form;

    /**
     * @inheritdoc
     */
    protected function getTemplate()
    {
        return 'child_form';
    }

    /**
     * @return Form
     */
    public function getForm()
    {
        return $this->form;
    }

    /**
     * @inheritdoc
     */
    protected function getDefaults()
    {
        return [
            'class' => null,
            'default_value' => false,
            'formOptions' => [],
            'data' => [],
            'exclude' => []
        ];
    }

    /**
     * @return mixed|void
     */
    protected function createChildren()
    {
        $this->form = $this->getClassFromOptions();

        if ($this->form->getFormOption('files')) {
            $this->parent->setFormOption('files', true);
        }

        $model = $this->getOption('default_value');

        if ($model !== false) {
            foreach ($this->form->getFields() as $name => $field) {
                $field->setValue($this->getModelValueAttribute($model, $name));
            }
        }

        $this->children = $this->form->getFields();
    }

    /**
     * @return Form
     * @throws \Exception
     */
    protected function getClassFromOptions()
    {
        if ($this->form instanceof Form) {
            return $this->form->setName($this->name);
        }

        $class = $this->getOption('class');

        if (!$class) {
            throw new \InvalidArgumentException(
                'Please provide full name or instance of Form class.'
            );
        }

        if (is_string($class)) {
            $formOptions = array_merge(
                ['model' => $this->parent->getModel(), 'name' => $this->name],
                $this->getOption('formOptions')
            );

            $data = array_merge($this->parent->getData(), $this->getOption('data'));

            return $this->parent->getFormBuilder()->create(
                $class,
                $formOptions,
                $data
            );
        }

        if ($class instanceof Form) {
            if (!$class->getModel()) {
                $class->setModel($this->parent->getModel());
            }

            if (!$class->getData()) {
                $class->addData($this->parent->getData());
            }

            return $class->setName($this->name);
        }

        throw new \InvalidArgumentException(
            'Class provided does not exist or it passed in wrong format.'
        );
    }

    /**
     * @param $method
     * @param $arguments
     *
     * @return Form|null
     */
    public function __call($method, $arguments)
    {
        if (method_exists($this->form, $method)) {
            return call_user_func_array([$this->form, $method], $arguments);
        }

        throw new \BadMethodCallException(
            'Method ['.$method.'] does not exist on form ['.get_class($this->form).']'
        );
    }
}
