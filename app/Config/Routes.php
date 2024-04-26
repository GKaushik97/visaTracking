<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', 'Home::index', ['filter' => 'ModuleAuth']);
// Login module
$routes->get('login', [App\Controllers\User\Login::class, 'index']);
$routes->get('login/(:any)', [App\Controllers\User\Login::class, '$1']);
$routes->post('login/(:any)', [App\Controllers\User\Login::class, '$1']);

// Profile
$routes->get('profile', [App\Controllers\User\Profile::class, 'index'], ['filter' => 'Auth']);
$routes->get('profile/(:any)', [App\Controllers\User\Profile::class, '$1'], ['filter' => 'Auth']);
$routes->post('profile/(:any)', [App\Controllers\User\Profile::class, '$1'], ['filter' => 'Auth']);

// Users Module
$routes->get('user', [App\Controllers\User\User::class, 'index'], ['filter' => 'ModuleAuth']);
$routes->get('user/(:any)', [App\Controllers\User\User::class, '$1'], ['filter' => 'ModuleAuth']);
$routes->post('user/(:any)', [App\Controllers\User\User::class, '$1'], ['filter' => 'ModuleAuth']);

// Roles Module
$routes->get('role', [App\Controllers\User\Roles::class, 'index'], ['filter' => 'ModuleAuth']);
$routes->get('role/(:any)', [App\Controllers\User\Roles::class, '$1'], ['filter' => 'ModuleAuth']);
$routes->post('role/(:any)', [App\Controllers\User\Roles::class, '$1'], ['filter' => 'ModuleAuth']);

// Modules Module
$routes->get('module', [App\Controllers\Settings\Modules::class, 'index'], ['filter' => 'ModuleAuth']);
$routes->get('module/(:any)', [App\Controllers\Settings\Modules::class, '$1'], ['filter' => 'ModuleAuth']);
$routes->post('module/(:any)', [App\Controllers\Settings\Modules::class, '$1'], ['filter' => 'ModuleAuth']);

// Country Module
$routes->get('country', [App\Controllers\visaTracking\Country::class,'index'], ['filter' => App\Filters\ModuleAuth::class]);
$routes->get('country/(:any)', [App\Controllers\visaTracking\Country::class, '$1'], ['filter' => App\Filters\ModuleAuth::class]);
$routes->post('country/(:any)', [App\Controllers\visaTracking\Country::class, '$1'], ['filter' => App\Filters\ModuleAuth::class]);

// State Module
$routes->get('state', [App\Controllers\visaTracking\State::class, 'index'], ['filter' => App\Filters\ModuleAuth::class]);
$routes->get('state/(:any)', [App\Controllers\visaTracking\State::class, '$1'], ['filter' => App\Filters\ModuleAuth::class]);
$routes->post('state/(:any)', [App\Controllers\visaTracking\State::class, '$1'], ['filter' => App\Filters\ModuleAuth::class]);

// District Module
$routes->get('district', [App\Controllers\visaTracking\District::class, 'index'], ['filter' => App\Filters\ModuleAuth::class]);
$routes->get('district/(:any)', [App\Controllers\visaTracking\District::class, '$1'], ['filter' => App\Filters\ModuleAuth::class]);
$routes->post('district/(:any)', [App\Controllers\visaTracking\District::class, '$1'], ['filter' => App\Filters\ModuleAuth::class]);

// Visa Tracking Modules
$routes->get('familyRelation', [App\Controllers\visaTracking\FamilyRelation::class, 'index'], ['filter' => App\Filters\ModuleAuth::class]);
$routes->get('familyRelation/(:any)', [App\Controllers\visaTracking\FamilyRelation::class, '$1'], ['filter' => App\Filters\ModuleAuth::class]);
$routes->post('familyRelation/(:any)', [App\Controllers\visaTracking\FamilyRelation::class, '$1'], ['filter' => App\Filters\ModuleAuth::class]);

// Visa Tracking Modules
$routes->get('educationalQualification', [App\Controllers\visaTracking\EducationalQualification::class, 'index'], ['filter' => App\Filters\ModuleAuth::class]);
$routes->get('educationalQualification/(:any)', [App\Controllers\visaTracking\EducationalQualification::class, '$1'], ['filter' => App\Filters\ModuleAuth::class]);
$routes->post('educationalQualification/(:any)', [App\Controllers\visaTracking\EducationalQualification::class, '$1'], ['filter' => App\Filters\ModuleAuth::class]);

// Documents Modules
$routes->get('documenttypes', [App\Controllers\visaTracking\DocumentTypes::class, 'index'], ['filter' => App\Filters\ModuleAuth::class]);
$routes->get('documenttypes/(:any)', [App\Controllers\visaTracking\DocumentTypes::class, '$1'], ['filter' => App\Filters\ModuleAuth::class]);
$routes->post('documenttypes/(:any)', [App\Controllers\visaTracking\DocumentTypes::class, '$1'], ['filter' => App\Filters\ModuleAuth::class]);

$routes->get('employee', [App\Controllers\visaTracking\Employees::class, 'index'], ['filter' => App\Filters\ModuleAuth::class]);
$routes->get('employee/(:any)', [App\Controllers\visaTracking\Employees::class, '$1'], ['filter' => App\Filters\ModuleAuth::class]);
$routes->post('employee/(:any)', [App\Controllers\visaTracking\Employees::class, '$1'], ['filter' => App\Filters\ModuleAuth::class]);

$routes->get('familyDetails', [App\Controllers\visaTracking\FamilyDetails::class, 'index'], ['filter' => App\Filters\ModuleAuth::class]);
$routes->get('familyDetails/(:any)', [App\Controllers\visaTracking\FamilyDetails::class, '$1'], ['filter' => App\Filters\ModuleAuth::class]);
$routes->post('familyDetails/(:any)', [App\Controllers\visaTracking\FamilyDetails::class, '$1'], ['filter' => App\Filters\ModuleAuth::class]);

$routes->get('employeeEducation', [App\Controllers\visaTracking\EmployeeEducation::class, 'index'], ['filter' => App\Filters\ModuleAuth::class]);
$routes->get('employeeEducation/(:any)', [App\Controllers\visaTracking\EmployeeEducation::class, '$1'], ['filter' => App\Filters\ModuleAuth::class]);
$routes->post('employeeEducation/(:any)', [App\Controllers\visaTracking\EmployeeEducation::class, '$1'], ['filter' => App\Filters\ModuleAuth::class]);

$routes->get('employeeExperience', [App\Controllers\visaTracking\EmployeeExperience::class, 'index'], ['filter' => App\Filters\ModuleAuth::class]);
$routes->get('employeeExperience/(:any)', [App\Controllers\visaTracking\EmployeeExperience::class, '$1'], ['filter' => App\Filters\ModuleAuth::class]);
$routes->post('employeeExperience/(:any)', [App\Controllers\visaTracking\EmployeeExperience::class, '$1'], ['filter' => App\Filters\ModuleAuth::class]);

$routes->get('employeDocuments', [App\Controllers\visaTracking\EmployeeDocuments::class, 'index'], ['filter' => App\Filters\ModuleAuth::class]);
$routes->get('employeDocuments/(:any)', [App\Controllers\visaTracking\EmployeeDocuments::class, '$1'], ['filter' => App\Filters\ModuleAuth::class]);
$routes->post('employeDocuments/(:any)', [App\Controllers\visaTracking\EmployeeDocuments::class, '$1'], ['filter' => App\Filters\ModuleAuth::class]);

$routes->get('configuration',[App\Controllers\Settings\Configuration::class,'index'], ['filer' => App\Filters\ModuleAuth::class]);