<?php

Route::get('/', 'BooksController@getIndex'); 

Route::get('/admin','HomeController@admin_settings'); 
Route::post('/adminUpdate','HomeController@update'); 
Route::get('/dashboard','DashboardController@show'); 

Route::post('addCategory','CategoryController@store'); 
Route::post('addLocation','LocationController@store');

Route::get('categories','CategoryController@show'); 
Route::get('locations','LocationController@show'); 


Route::get('/books','BooksController@index');
Route::get('/books/paginate','BooksController@showPage');
Route::get('/books/ajaxsearch','BooksController@ajaxsearch'); 
Route::get('/book/edit','BooksController@updatebook'); 
Route::get('/member/info','MembersController@show'); 
Route::get('/member/getinfo','MembersController@show'); 
Route::post('/member/update','MembersController@update'); 
Route::post('/member/create','MembersController@store'); 
Route::post('/member/delete','MembersController@destroy'); 
Route::post('/category/delete','CategoryController@destroy'); 
Route::post('/location/delete','LocationController@destroy');


Route::get('books/create', 'BooksController@create')->name('book.create');
Route::post('addbook','BooksController@store')->name('book.store');
Route::post('books/importCsv','BooksController@importCsv');
Route::get('/book/info','BooksController@show');
Route::post('delete','BooksController@destroy');
Route::post('returnBook','IssuesController@destroy');
Route::get('/books/edit/{id}', 'BooksController@edit')->name('book.edit');
Route::put('/books/edit/{id}','BooksController@update')->name('book.update');
Route::post('updatecat','CategoryController@update');
Route::post('updateloc','LocationController@update');


Route::get('/issue_book','IssuesController@create');
Route::get('/issues','IssuesController@show');
Route::post('/issues','IssuesController@search');
Route::post('/issues_not_returned','IssuesController@search_not_returned');
Route::get('/issues_not_returned','IssuesController@not_returned');


Route::get('/registration','UsersController@create');
Route::get('members','UsersController@show');
Route::post('members','MembersController@search');


Route::get('catSearch','SearchController@searchCategory');
Route::get('nameSearch','SearchController@searchName');
Route::get('issuesearchName','SearchController@issuesearchName');
Route::get('authorSearch','SearchController@searchAuthor');

Route::get('bookSearch','SearchController@bookSearch');



Route::get('book/issue','BooksController@MemberInfo');
Route::post('issueBook','IssuesController@store');

Route::post('/books','BooksController@search');



Auth::routes();

