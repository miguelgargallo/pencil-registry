<?php

return [
    'visit_site' => 'Visit Site',
    'true' => 'True',
    'false' => 'False',
    'return_message' => [
        'success_store' => ':menu successfully create.',
        'success_update' => ':menu successfully update.',
        'success_destroy' => ':menu successfully delete.',
    ],
    'error' => [
        'unknown_error' => 'Unknown Error, Please contact Administrator.',
    ],
    'menu' => [
        'dashboard' => 'Dashboard',
        'master' => 'Master',
        'api_key' => 'API Key',
        'zone' => 'Zone',
        'blacklist_domain' => 'Blacklist Domain',
        'setting' => 'Setting',
        'user' => 'User',
        'page' => 'Page',
        'message' => 'Message',
        'log_out' => 'Log Out',
        // just for return message
        'dns' => 'DNS Record',
        'domain' => 'Domain'
    ],
    'apikey' => [
        'header' => 'API Key',
        'box_index' => 'API Key List',
        'head_email' => 'Email',
        'head_created_at' => 'Created At',
        'head_total_zone' => 'Total Zone',
        'box_form' => 'API Key Form',
        'field_email' => 'Email',
        'field_key' => 'Key',
    ],
    'zone' => [
        'header' => 'Zone',
        'box_index' => 'Zone List',
        'head_name' => 'Name',
        'head_api_key' => 'API Key',
        'head_enabled' => 'Enabled',
        'head_total_domain' => 'Total Domain',
        'head_created_at' => 'Created At',
        'box_form' => 'Zone Form',
        'field_name' => 'Name',
        'field_api_key' => 'API Key',
        'box_edit' => 'Edit Zone',
        'please_change_ns' => 'Please change your domain nameservers with following nameservers!!!',
        'field_name_server_1' => 'Name Server 1',
        'field_name_server_2' => 'Name Server 2',
        'field_total_domains' => 'Total Domains',
        'field_enabled' => 'Enabled',
        'dns' => 'Zone DNS',
        'box_show' => 'Show Zone',
        'box_domain_list' => 'Domain List',
        'head_domain' => 'Domain',
        'head_registration_date' => 'Registration Date',
        'head_expire_date' => 'Expire Date',
        'head_total_dns' => 'Total DNS',
    ],
    'user_domain' => [
        'header' => 'Domain : ',
        'box_show' => 'User Domain',
        'head_domain' => 'Domain',
        'head_registration_date' => 'Registration Date',
        'head_expire_date' => 'Expire Date',
        'head_total_dns' => 'Total DNS',
        'box_dns_list' => 'Domain DNS',
    ],
    'blacklist_domain' => [
        'header' => 'Blacklist Domain',
        'box_index' => 'Blacklist Domain List',
        'head_domain_name' => 'Domain',
        'head_zone' => 'Zone',
        'head_created_at' => 'Created At',
        'box_show' => 'Show Blacklist Domain',
        'global' => 'Global',
        'field_name' => 'Domain',
        'field_zone_name' => 'Zone Name',
        'field_reason' => 'Reason',
        'box_form' => 'Blacklist Domain Form',
        'field_zone' => 'Zone',
    ],
    'contact' => [
        'header' => 'Message',
        'box_index' => 'Message List',
        'head_from' => 'From',
        'head_email' => 'Email',
        'head_date' => 'Received At',
        'head_status' => 'Status',
        'status_read' => 'Read',
        'status_unread' => 'Unread',
        'box_show' => 'Show Message',
        'field_from' => 'From',
        'field_email' => 'Email',
        'field_message' => 'Message',
    ],
    'page' => [
        'header' => 'Page',
        'box_index' => 'Page List',
        'head_title' => 'Title',
        'head_created_at' => 'Created At',
        'head_last_updated' => 'Updated At',
        'box_form' => 'Page Form',
        'field_title' => 'Title',
        'field_slug' => 'Slug',
        'field_content' => 'Content',
    ],
    'user' => [
        'header' => 'User',
        'box_index' => 'User List',
        'head_full_name' => 'Full Name',
        'head_email' => 'Email',
        'head_registered_at' => 'Registered At',
        'head_enabled' => 'Enabled',
        'head_total_domain' => 'Total Domain',
        'box_form' => 'User Form',
        'field_full_name' => 'Full Name',
        'field_email' => 'Email',
        'field_new_password' => 'New Password',
        'field_new_password_confirmation' => 'New Password Confirmation',
        'field_enabled' => 'Enabled',
        'box_show' => 'Show User',
        'box_domain_list' => 'User Domain List',
    ],
    'setting' => [
        'header' => 'Setting',
        'box_index' => 'Setting List',
        'tab_website' => 'Website',
        'tab_homepage' => 'Homepage',
        'tab_domain' => 'Domain',
        'tab_security' => 'Security',
        'box_form' => 'Edit Setting',
        'field_keyword' => 'Keywords',
        'field_description' => 'Description',
        'field_page_title' => 'Page Title',
        'field_lead_title' => 'Lead Homepage Title',
        'field_middle_title' => 'Middle Title',
        'field_middle_body' => 'Middle Body',
        'field_footer_left_title' => 'Footer Left Title',
        'field_footer_left_body' => 'Footer Left Body',
        'field_footer_right_title' => 'Footer Right Title',
        'field_footer_right_body' => 'Footer Right Body',
        'field_footer_social_title' => 'Footer Social Title',
        'field_footer_social_facebook' => 'Facebook Link',
        'field_footer_social_twitter' => 'Twitter Link',
        'field_footer_social_googleplus' => 'Google Plus Link',
        'field_footer_social_pinterest' => 'Pinterest Link',
        'field_footer_social_linkedin' => 'LinkedIn Link',
        'field_footer_social_instagram' => 'Instagram Link',
        'field_footer_social_youtube' => 'Youtube Link',
        'field_domain_min_chars' => 'Domain Minimum Characters',
        'field_domain_max_chars' => 'Domain Maximum Characters',
        'field_domain_registration_year' => 'Domain Registration Year',
        'field_domains_per_user' => 'Domain Per User',
        'field_dns_per_domain' => 'DNS Records Per Domain',
        'field_google_analytics' => 'Google Analytics ID',
        'field_captcha_on_login' => 'Recaptcha On Login',
        'field_captcha_on_register' => 'Recaptcha On Register',
        'help' => [
            'dns_per_domain' => 'Maximum DNS Records Per Domain. (0 is unlimited).',
            'domains_per_user' => 'Maximum of Domains per user.',
            'domain_registration_year' => 'Default duration of user register the domain (year).',
        ],
    ],
];
