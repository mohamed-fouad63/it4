<?php

use Core\Http\Route;
Route::controller(OrderController::class)->group(function ($route) {
    $route->get('/it4/orders/', 'show');
    $route->post('/it4/orders', 'store');
});
Route::get('/it4/test1','TestController@test1');
Route::get('/it4/', 'LoginController@login',['AuthLogin']);
Route::get('/it4/console', 'console');
Route::get('/it4/logout', 'LoginController@logout',['AuthSessionLogin']);
Route::ajax('/it4/submit_login', [LoginController::class, 'submit_login']);
Route::ajax('/it4/change_password', [LoginController::class, 'change_password']);
// Dashboard Page
Route::get('/it4/dashboard', 'DashboardController@dashboard',['AuthSessionLogin']);
Route::get('/it4/getOfficeByType', 'OfficeController@getOfficeByType',['AuthSessionLogin']);
Route::ajax('/it4/countOfficeNameByType', [OfficeController::class, 'countOfficeNameByType']);
Route::get('/it4/dvices', 'DviceController@dvices',['AuthSessionLogin']);
Route::get('/it4/getDviceById', 'DviceController@getDviceById',['AuthSessionLogin']);
Route::get('/it4/getDviceByType', 'DviceController@getDviceByType',['AuthSessionLogin']);
Route::get('/it4/OfficesDvicesReport', 'DviceController@OfficesDvicesReport',['AuthSessionLogin']);
Route::get('/it4/postalDvicesComptaible', 'DviceController@postalDvicesComptaible',['AuthSessionLogin']);
Route::get('/it4/pcsMonitorsComptaible', 'DviceController@pcsMonitorsComptaible',['AuthSessionLogin']);
Route::get('/it4/repeatSn', 'DviceController@repeatSn');
Route::ajax('/it4/ajaxOfficesDvicesReport', [DviceController::class, 'ajaxOfficesDvicesReport']); // ajax dataTbale
Route::ajax('/it4/ajaxCountDviceNameById', [DviceController::class, 'ajaxCountDviceNameById']); // ajax dataTbale
Route::ajax('/it4/ajaxCountDviceNameByType', [DviceController::class, 'ajaxCountDviceNameByType']); // ajax dataTbale
Route::ajax('/it4/ajaxCountDviceNameByName', [DviceController::class, 'ajaxCountDviceNameByName']); // ajax dataTbale
// Office Group Page
Route::get('/it4/officeGroup', 'OfficeController@getOfficeGroup',['AuthSessionLogin']);
Route::ajax('/it4/ajaxofficeGroupName', 'OfficeController@ajaxofficeGroupName'); // ajax dataTbale
Route::ajax('/it4/ajaxofficeGroupDetails', 'OfficeController@ajaxofficeGroupDetails'); // ajax dataTbale
Route::ajax('/it4/ajaxAddPostOffice', 'OfficeController@ajaxAddPostOffice'); // ajax dataTbale
Route::ajax('/it4/ajaxEditPostOffice', 'OfficeController@ajaxEditPostOffice'); // ajax dataTbale
Route::ajax('/it4/ajaxAddofficeGroup', 'OfficeController@ajaxAddofficeGroup'); // ajax dataTbale
Route::ajax('/it4/ajaxEditofficeGroup', 'OfficeController@ajaxEditofficeGroup'); // ajax dataTbale
Route::ajax('/it4/ajaxDelofficeGroup', 'OfficeController@ajaxDelofficeGroup'); // ajax dataTbale
Route::get('/it4/grd', 'DviceController@grd',['AuthSessionLogin']);
// Dvices Office Page
Route::get('/it4/dvicesOffice', 'DviceController@dvicesOffice',['AuthSessionLogin']);
Route::get('/it4/authDviceMoveTo', 'DviceController@authDviceMoveTo',['AuthSessionLogin']);
Route::ajax('/it4/ajaxOfficesName', 'OfficeController@ajaxOfficesName'); // reg to & reg in page
Route::ajax('/it4/ajaxOfficesDetails', 'OfficeController@ajaxOfficesDetails');
Route::ajax('/it4/ajaxDvicesOfficePc', 'DviceController@ajaxDvicesOfficePc');
Route::ajax('/it4/ajaxDvicesOfficeMonitor', 'DviceController@ajaxDvicesOfficeMonitor');
Route::ajax('/it4/ajaxDvicesOfficePrinter', 'DviceController@ajaxDvicesOfficePrinter');
Route::ajax('/it4/ajaxDvicesOfficePos', 'DviceController@ajaxDvicesOfficePos');
Route::ajax('/it4/ajaxDvicesOfficeNetwork', 'DviceController@ajaxDvicesOfficeNetwork');
Route::ajax('/it4/ajaxDvicesOfficePostal', 'DviceController@ajaxDvicesOfficePostal');
Route::ajax('/it4/ajaxDvicesOfficeOther', 'DviceController@ajaxDvicesOfficeOther');
Route::ajax('/it4/ajaxDvicesId', 'DviceController@ajaxDvicesId');
Route::ajax('/it4/ajaxDvicesNameById', 'DviceController@ajaxDvicesNameById');
Route::ajax('/it4/ajaxDviceTypeByName', 'DviceController@ajaxDviceTypeByName');
Route::ajax('/it4/ajaxAddDvice', 'DviceController@ajaxAddDvice');
Route::ajax('/it4/ajaxEditDvice', 'DviceController@ajaxEditDvice');
Route::ajax('/it4/ajaxMoveDvice', 'DviceController@ajaxMoveDvice');
Route::ajax('/it4/ajaxDviceToIt', 'DviceController@ajaxDviceToIt');
Route::ajax('/it4/ajaxOfficesNames', 'OfficeController@ajaxOfficesNames'); // To lists offices
// Dvices In It page
Route::get('/it4/dvicesInIt', 'DviceController@dvicesInIt',['AuthSessionLogin']);
Route::ajax('/it4/ajaxDvicesInIt', 'DviceController@ajaxDvicesInIt'); //ajax datatable
Route::ajax('/it4/ajaxDvicesEditInIt', 'DviceController@ajaxDvicesEditInIt');
Route::ajax('/it4/ajaxDvicesDeleteInIt', 'DviceController@ajaxDvicesDeleteInIt');
Route::post('/it4/PosDeliverReport', 'DviceController@PosDeliverReport');
Route::ajax('/it4/ajaxposDeliver', 'DviceController@ajaxposDeliver');
Route::ajax('/it4/ajaxMoveToInIt', 'DviceController@ajaxMoveToInIt');
Route::ajax('/it4/ajaxReplacePicesDvice', 'DviceController@ajaxReplacePicesDvice');
Route::ajax('/it4/ajaxToTts', 'DviceController@ajaxToTts');
Route::get('/it4/authRepair', 'DviceController@authRepair',['AuthSessionLogin']);
Route::ajax('/it4/ajaxResentToOfice', 'DviceController@ajaxResentToOfice');
// Dvices In Tss page
Route::get('/it4/dvicesInTts', 'DviceController@dvicesInTts');
Route::ajax('/it4/ajaxDvicesInTts', 'DviceController@ajaxDvicesInTts'); //ajax datatable
Route::ajax('/it4/ajaxDvicesEditInTts', 'DviceController@ajaxDvicesEditInTts');
Route::ajax('/it4/ajaxResentToIt', 'DviceController@ajaxResentToIt');
// Temp Moved page
Route::get('/it4/temp_moved', 'DviceController@temp_moved',['AuthSessionLogin']);
Route::ajax('/it4/ajaxTempMoved', 'DviceController@ajaxTempMoved');
Route::ajax('/it4/ajaxResentMovedToOfice', 'DviceController@ajaxResentMovedToOfice');
// All Dvices page
Route::get('/it4/allDvices', 'DviceController@allDvices',['AuthSessionLogin']);
Route::ajax('/it4/ajaxAllDvices', 'DviceController@ajaxAllDvices');
// Repair Dvives page
Route::get('/it4/repairDvices', 'DviceController@repairDvices',['AuthSessionLogin']);
Route::ajax('/it4/ajaxRepairDvices', 'DviceController@ajaxRepairDvices');
// Moving Dvives page
Route::get('/it4/moveingDvices', 'DviceController@moveingDvices',['AuthSessionLogin']);
Route::ajax('/it4/ajaxMoveingDvices', 'DviceController@ajaxMoveingDvices');
// Replace Dvives page
Route::get('/it4/replaceDvices', 'DviceController@replaceDvices',['AuthSessionLogin']);
Route::ajax('/it4/ajaxReplaceDvices', 'DviceController@ajaxReplaceDvices');
// Deleted Dvives page
Route::get('/it4/deletedDvices', 'DviceController@deletedDvices',['AuthSessionLogin']);
Route::ajax('/it4/ajaxDeletedDvices', 'DviceController@ajaxDeletedDvices');
// All Mission page
Route::get('/it4/allMission', 'MisinController@allMission',['AuthSessionLogin']);
Route::ajax('/it4/ajaxAllMission', 'MisinController@ajaxAllMission');
// Vacation page
Route::get('/it4/vacation', 'MisinController@vacation',['AuthSessionLogin']);
Route::ajax('/it4/ajaxVacation', 'MisinController@ajaxVacation');
// My Mission page
Route::get('/it4/myMission', 'MisinController@myMission',['AuthSessionLogin']);
Route::ajax('/it4/ajaxMyMission', 'MisinController@ajaxMyMission');
Route::get('/it4/misinForm', 'MisinController@misinForm',[]);
Route::post('/it4/misinReport', 'MisinController@misinReport',[]);
// Mission On line page
Route::get('/it4/MissionOnline', 'MisinController@MissionOnline',['AuthSessionLogin']);
Route::ajax('/it4/ajaxMissionOnline', 'MisinController@ajaxMissionOnline');
Route::ajax('/it4/ajaxAddMissionOnline', 'MisinController@ajaxAddMissionOnline');
Route::ajax('/it4/ajaxDelMissionOnline', 'MisinController@ajaxDelMissionOnline');
Route::post('/it4/vactionFormSubOnLine', 'MisinController@vactionFormSubOnLine',['AuthSessionLogin']);
Route::post('/it4/badlRahaFormSubOnLine', 'MisinController@badlRahaFormSubOnLine',['AuthSessionLogin']);
// Missions page
Route::get('/it4/Missions', 'MisinController@Missions',['AuthSessionLogin']);
Route::ajax('/it4/usersInfo', 'UserController@usersInfo');
Route::ajax('/it4/ajaxMissions', 'MisinController@ajaxMissions');
Route::ajax('/it4/ajaxAddMission', 'MisinController@ajaxAddMission');
Route::ajax('/it4/ajaxDelMission', 'MisinController@ajaxDelMission');
// Vaction Form Sub Page
Route::post('/it4/vactionFormSub', 'MisinController@vactionFormSub',['AuthSessionLogin']);
// Reg To page
Route::get('/it4/regTo', 'RegController@regTo',['AuthSessionLogin']);
Route::ajax('/it4/ajaxRegTo', 'RegController@ajaxRegTo');
Route::ajax('/it4/ajaxAddRegTo', 'RegController@ajaxAddRegTo');
Route::ajax('/it4/ajaxRegToEdit', 'RegController@ajaxRegToEdit');
Route::ajax('/it4/ajaxRegToDel', 'RegController@ajaxRegToDel');
Route::ajax('/it4/ajaxregToAddSub', 'RegController@ajaxregToAddSub');
// Reg To Search page
Route::get('/it4/regToSearch', 'RegController@regToSearch',['AuthSessionLogin']);
Route::ajax('/it4/ajaxregToSearch', 'RegController@ajaxregToSearch');
// Reg In page
Route::get('/it4/regIn', 'RegController@regIn',['AuthSessionLogin']);
Route::ajax('/it4/ajaxRegIn', 'RegController@ajaxRegIn');
Route::ajax('/it4/ajaxAddRegIn', 'RegController@ajaxAddRegIn');
Route::ajax('/it4/ajaxRegInEdit', 'RegController@ajaxRegInEdit');
Route::ajax('/it4/ajaxRegInDel', 'RegController@ajaxRegInDel');
Route::ajax('/it4/ajaxregInAddSub', 'RegController@ajaxregInAddSub');
// Reg In Search page
Route::get('/it4/regInSearch', 'RegController@regInSearch',['AuthSessionLogin']);
Route::ajax('/it4/ajaxregInSearch', 'RegController@ajaxregInSearch');
// Parcel To page
Route::get('/it4/parcelTo', 'RegController@parcelTo',['AuthSessionLogin']);
Route::ajax('/it4/ajaxParcelTo', 'RegController@ajaxParcelTo');
Route::ajax('/it4/ajaxAddParcelTo', 'RegController@ajaxAddParcelTo');
Route::ajax('/it4/ajaxParcelToEdit', 'RegController@ajaxParcelToEdit');
Route::ajax('/it4/ajaxParcelToDel', 'RegController@ajaxParcelToDel');
Route::ajax('/it4/ajaxParcelToAddSub', 'RegController@ajaxParcelToAddSub');
// Reg In Search page
Route::get('/it4/parcelToSearch', 'RegController@parcelToSearch',['AuthSessionLogin']);
Route::ajax('/it4/ajaxParcelToSearch', 'RegController@ajaxParcelToSearch');
// Users Auth page
Route::get('/it4/usersAuth', 'UserController@usersAuth',['AuthSessionLogin']);
Route::ajax('/it4/ajaxUsersAuth', 'UserController@ajaxUsersAuth');
Route::ajax('/it4/ajaxResetUserPassword', 'UserController@ajaxResetUserPassword');
Route::ajax('/it4/ajaxEditUserAuth', 'UserController@ajaxEditUserAuth');
Route::ajax('/it4/ajaxAddUser', 'UserController@ajaxAddUser');
Route::ajax('/it4/ajaxEditUser', 'UserController@ajaxEditUser');
