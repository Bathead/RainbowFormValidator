# Rainbow Form Validator

About
---------------
Simple HTML Form Validator

Features
---------------
* Only one method (static)
* Supported all html form fields.
* Supported required and match validation.

Requirements
---------------
* PHP 5.4

Using
---------------

Create validation rules:
```php
RainbowFormValidator::validateArray($_POST, 
  [
    'username' => [
      'name' => 'Username',
      'rules' => ['required' => true],
      ],
    'password' => [
      'name' => 'Password',
      'rules' => ['required' => true],
      ],
    'password_confirm' => [
      'name' => 'Password Confirm',
      'rules' => ['required' => true, 'match' => 'password'],
      ],
  ]);
```

Display errors
```php
print_r(RainbowFormValidator::$errors);
/*
Array
(
    [email] => <b>Email</b> field is required
    [password] => <b>Password</b> field is required
    [password_confirm] => <b>Password</b> field doesn't match with <b>Password Confirm</b>
)
/*
```
