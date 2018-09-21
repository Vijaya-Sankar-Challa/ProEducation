<?php

Route::get('/', function () {
    if (Auth::guest()) {
    	 return view('welcome');
    }
    else{
    	return redirect('/dashboard');
    }
});

Route::get('/asss', function ()
{
	return view('home');
});

Route::get('/relation', 'TestController@relationships');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->middleware('redirecthome');

Route::get('/cat', function ()
{
	return view('free.myprojects');
});

Route::group(['middleware' => ['auth', 'prevent-back-history']], function () {

	// All my routes that needs a logged in user
	
	Route::get('/dashboard', function () {
		return view('dashboard');
	});

	// View to Internships
	Route::get('/internship', 'InternshipController@index');

	// Internship Application Form
	Route::post('/internship/apply', 'InternshipController@internshipformrequest');

	// Internship Details
	Route::get('/internship/{intcatid}', 'InternshipController@internshipdetails');

	// Internship Details
	Route::get('/internship/{intcatid}/{intdetid}', 'InternshipController@internshipfulldetails');

	// Admin Users CRUD Starts Here
	Route::resource('user','AdminUsersController');
  	Route::post ( '/editItem', 'AdminUsersController@editItem' );
	Route::post ( '/deleteItem', 'AdminUsersController@deleteItem' );
	Route::post('/adminregister', 'AdminUsersController@adminregister');
	// Admin Users CRUD Ends Here

	// Admin Skills CRUD Starts Here
	Route::resource('skills','AdminSkillsController');
  	Route::post ( '/editskillItem', 'AdminSkillsController@editItem' );
	Route::post ( '/deleteskillItem', 'AdminSkillsController@deleteItem' );
	Route::post('/adminskillsregister', 'AdminSkillsController@adminskillsregister');
	// Admin Skills CRUD Ends Here

	// Admin Sub Skills CRUD Starts Here
	Route::resource('subskills','AdminSubSkillsController');
  	Route::post ( '/editsubskillItem', 'AdminSubSkillsController@editItem' );
	Route::post ( '/deletesubskillItem', 'AdminSubSkillsController@deleteItem' );
	Route::post('/adminsubskillsregister', 'AdminSubSkillsController@adminsubskillsregister');
	// Admin Sub Skills CRUD Ends Here

	// Admin Project Category CRUD Starts Here
	Route::resource('procats','AdminProjectCategoryController');
  	Route::post ( '/editprocatItem', 'AdminProjectCategoryController@editItem' );
	Route::post ( '/deleteprocatItem', 'AdminProjectCategoryController@deleteItem' );
	Route::post('/adminprocatregister', 'AdminProjectCategoryController@adminprocatregister');
	// Admin Project Category CRUD Ends Here

	// Admin Sub Project Category CRUD Starts Here
	Route::resource('subprocats','AdminSubProjectCategoryController');
  	Route::post ( '/editsubprocatItem', 'AdminSubProjectCategoryController@editItem' );
	Route::post ( '/deletesubprocatItem', 'AdminSubProjectCategoryController@deleteItem' );
	Route::post('/adminsubprocatregister', 'AdminSubProjectCategoryController@adminsubprocatregister');
	// Admin Sub Project Category CRUD Ends Here

	// Admin Internship Category CRUD Starts Here
	Route::resource('interncat','AdminInternshipCategoryController');
  	Route::post ( '/editinterncatItem', 'AdminInternshipCategoryController@editItem' );
	Route::post ( '/deleteinterncatItem', 'AdminInternshipCategoryController@deleteItem' );
	Route::post('/admininterncatregister', 'AdminInternshipCategoryController@admininterncatregister');
	// Admin Internship Category CRUD Ends Here

	// Admin Internship Department CRUD Starts Here
	Route::resource('interndep','AdminInternshipDepartmentController');
  	Route::post ( '/editinterndepItem', 'AdminInternshipDepartmentController@editItem' );
	Route::post ( '/deleteinterndepItem', 'AdminInternshipDepartmentController@deleteItem' );
	Route::post('/admininterndepregister', 'AdminInternshipDepartmentController@admininterndepregister');
	// Admin Internship Department CRUD Ends Here

	// Admin Internship Details CRUD Starts Here
	Route::resource('interndet','AdminInternshipDetailsController');
  	Route::post ( '/editinterndetItem', 'AdminInternshipDetailsController@editItem' );
  	Route::post ( '/deleteinterndetItem', 'AdminInternshipDetailsController@deleteItem' );
	Route::post('/admininterndetregister', 'AdminInternshipDetailsController@admininterndetregister');
	// Admin Internship Details CRUD Ends Here

	//Display Internship Details Data
	Route::get('/admininterndet', 'AdminInternshipDetailsController@index');

	// Edit Internship Details Data
	Route::get('/admininterndetedit', 'AdminInternshipDetailsController@edit');

	//Display Internship Department Data
	Route::get('/admininterndep', 'AdminInternshipDepartmentController@index');

	//Display Internship category Data
	Route::get('/admininterncat', 'AdminInternshipCategoryController@index');

	//Display Users Data
	Route::get('/adminusers', 'AdminUsersController@adminusers');

	//Display Skills Data
	Route::get('/adminskills', 'AdminSkillsController@admin_skills');

	//Display Sub Skills Data
	Route::get('/adminsubskills', 'AdminSubSkillsController@admin_sub_skills');

	//Display Project Category Data
	Route::get('/adminprocat', 'AdminProjectCategoryController@admin_procat');

	//Display Sub Project Category Data
	Route::get('/adminsubprocat', 'AdminSubProjectCategoryController@admin_sub_procat');

	// Total Projects posted till date
	Route::get('/adminprojects', 'AdminUsersController@admin_projects_posted');

	//Total Bids Till Date
	Route::get('/adminbids', 'AdminUsersController@admin_bids');

	//Admin Dashboard
	Route::get('/admindashboard', 'admin@dashboardindex');

	//Admin Pannel
	Route::get('/nimda', 'admin@dashboardindex');

	// Sending database table column names 
	Route::get('/postproject', 'projectController@index');
	
	//Posting values of project to database
	Route::post('/postproject', 'projectController@postpro');
	
	//Ajax sending project category names dynamically 
	Route::get('/findproductname', 'projectController@findproductname');

	//Displaying Projects from database
	Route::get('/jobs', 'PostProController@index');

	//searching post_project table and Displaying results
	Route::get('/jobsearch', 'PostProController@search');

	//searching skills table and Displaying results
	Route::get('/jobskillsearch', 'PostProController@skillsearch');

	//Displaying specific job
	Route::get('/jobs/{id}','PostProController@openpro');

	//Submitting Bids
	Route::post('/submitbid', 'PostProController@submitbid');

	//Updating Pro Pic of user
	Route::post('/profilepic', 'profileController@update_avatar');

	//Displaying Profile results
	Route::get('/profile', 'profileController@profile');

	//Editing Intro of user and saving it
	Route::post('/profile', 'profileController@editintro');

	//User profiles visible to all
	Route::get('/profile/{username}', 'profileController@userprofiles');

	//Displaying Inbox results
	Route::get('/inbox', 'chatController@inbox');

	//Display projects of user
	Route::get('/myprojects', 'myprojectcontroller@index');

	//Accepting bids of a project
	Route::get('/myprojects/{projectname}', 'myprojectcontroller@acceptpro');

	//Req Accept project
	Route::get('/myprojects/{proname}/{proid}/{userid}', 'myprojectcontroller@reqacceptpro');

	// Upload file into storage and database
	Route::post('/fileupload', 'FileController@fileupload');

	// Delete file from Storage and Database
	Route::post('/fileupload/delete', 'FileController@delete');

});