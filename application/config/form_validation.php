<?php
$config = array(
    'admin_login'   => array(
        array(
            'field'     => 'username',
            'label'     => 'Username',
            'rules'     => 'required|trim'
        ),
        array(
            'field'     => 'password',
            'label'     => 'Password',
            'rules'     => 'required|trim'
        )
    ),
    'add_lead'  => array(
        array(
            'field'     => 'name',
            'label'     => 'Name',
            'rules'     => 'required|min_length[3]'
        ),
        array(
            'field'     => 'email',
            'label'     => 'Email',
            'rules'     => 'required'
        ),
        array(
            'field'     => 'contact',
            'label'     => 'Contact',
            'rules'     => 'required'
        ),
        array(
            'field'     => 'password',
            'label'     => 'Password',
            'rules'     => 'required'
        )
    ),
    'edit_lead'  => array(
        array(
            'field'     => 'name',
            'label'     => 'Name',
            'rules'     => 'required|min_length[3]'
        ),
        array(
            'field'     => 'email',
            'label'     => 'Email',
            'rules'     => 'required'
        ),
        array(
            'field'     => 'contact',
            'label'     => 'Contact',
            'rules'     => 'required'
        )
    ),
    'admin_profile' => array(
        array(
            'field'     => 'name',
            'label'     => 'Name',
            'rules'     => 'required|min_length[3]'
        ),
        array(
            'field'     => 'email',
            'label'     => 'Email',
            'rules'     => 'required'
        )
    ),
    'change_password' => array(
        array(
            'field'     => 'password',
            'label'     => 'Password',
            'rules'     => 'required'
        )
    ),
    'add_users' => array(
        array(
            'field'     => 'user_type',
            'label'     => 'User Type',
            'rules'     => 'required'
        ),
        array(
            'field'     => 'username',
            'label'     => 'Username',
            'rules'     => 'required'
        ),
        array(
            'field'     => 'name',
            'label'     => 'Name',
            'rules'     => 'required'
        ),
        array(
            'field'     => 'email',
            'label'     => 'Email',
            'rules'     => 'required'
        ),
        array(
            'field'     => 'password',
            'label'     => 'Password',
            'rules'     => 'required'
        ),  
    ),
    'edit_users' => array(
        array(
            'field'     => 'user_type',
            'label'     => 'User Type',
            'rules'     => 'required'
        ),
        array(
            'field'     => 'username',
            'label'     => 'Username',
            'rules'     => 'required'
        ),
        array(
            'field'     => 'name',
            'label'     => 'Name',
            'rules'     => 'required'
        ),
        array(
            'field'     => 'email',
            'label'     => 'Email',
            'rules'     => 'required'
        ),
    )
)
?>