<?php

use Core\Http\Route;
Route::get('/'.$_ENV["APP_NAME"].'/test1','TestController@test1');
Route::get('/'.$_ENV["APP_NAME"].'/', 'LoginController@login',['AuthLogin']);
Route::get('/'.$_ENV["APP_NAME"].'/console', 'console');
Route::get('/'.$_ENV["APP_NAME"].'/logout', 'LoginController@logout',['AuthSessionLogin']);
Route::ajax('/'.$_ENV["APP_NAME"].'/submit_login', [LoginController::class, 'submit_login']);
Route::ajax('/'.$_ENV["APP_NAME"].'/change_password', [LoginController::class, 'change_password']);
// Dashboard Page
Route::get('/'.$_ENV["APP_NAME"].'/dashboard', 'DashboardController@dashboard',['AuthSessionLogin']);
Route::get('/'.$_ENV["APP_NAME"].'/getOfficeByType', 'OfficeController@getOfficeByType',['AuthSessionLogin']);
Route::ajax('/'.$_ENV["APP_NAME"].'/countOfficeNameByType', [OfficeController::class, 'countOfficeNameByType']);
Route::get('/'.$_ENV["APP_NAME"].'/dvices', 'DviceController@dvices',['AuthSessionLogin']);
Route::get('/'.$_ENV["APP_NAME"].'/getDviceById', 'DviceController@getDviceById',['AuthSessionLogin']);
Route::get('/'.$_ENV["APP_NAME"].'/getDviceByType', 'DviceController@getDviceByType',['AuthSessionLogin']);
Route::get('/'.$_ENV["APP_NAME"].'/OfficesDvicesReport', 'DviceController@OfficesDvicesReport',['AuthSessionLogin']);
Route::get('/'.$_ENV["APP_NAME"].'/postalDvicesComptaible', 'DviceController@postalDvicesComptaible',['AuthSessionLogin']);
Route::get('/'.$_ENV["APP_NAME"].'/pcsMonitorsComptaible', 'DviceController@pcsMonitorsComptaible',['AuthSessionLogin']);
Route::get('/'.$_ENV["APP_NAME"].'/repeatSn', 'DviceController@repeatSn');
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxOfficesDvicesReport', [DviceController::class, 'ajaxOfficesDvicesReport']); // ajax dataTbale
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxCountDviceNameById', [DviceController::class, 'ajaxCountDviceNameById']); // ajax dataTbale
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxCountDviceNameByType', [DviceController::class, 'ajaxCountDviceNameByType']); // ajax dataTbale
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxCountDviceNameByName', [DviceController::class, 'ajaxCountDviceNameByName']); // ajax dataTbale
// Office Group Page
Route::get('/'.$_ENV["APP_NAME"].'/officeGroup', 'OfficeController@getOfficeGroup',['AuthSessionLogin']);
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxofficeGroupName', 'OfficeController@ajaxofficeGroupName'); // ajax dataTbale
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxofficeGroupDetails', 'OfficeController@ajaxofficeGroupDetails'); // ajax dataTbale
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxAddPostOffice', 'OfficeController@ajaxAddPostOffice'); // ajax dataTbale
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxEditPostOffice', 'OfficeController@ajaxEditPostOffice'); // ajax dataTbale
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxAddofficeGroup', 'OfficeController@ajaxAddofficeGroup'); // ajax dataTbale
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxEditofficeGroup', 'OfficeController@ajaxEditofficeGroup'); // ajax dataTbale
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxDelofficeGroup', 'OfficeController@ajaxDelofficeGroup'); // ajax dataTbale
Route::get('/'.$_ENV["APP_NAME"].'/grd', 'DviceController@grd',['AuthSessionLogin']);
// Dvices Office Page
Route::get('/'.$_ENV["APP_NAME"].'/dvicesOffice', 'DviceController@dvicesOffice',['AuthSessionLogin']);
Route::get('/'.$_ENV["APP_NAME"].'/authDviceMoveTo', 'DviceController@authDviceMoveTo',['AuthSessionLogin']);
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxOfficesName', 'OfficeController@ajaxOfficesName'); // reg to & reg in page
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxOfficesDetails', 'OfficeController@ajaxOfficesDetails');
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxDvicesOfficePc', 'DviceController@ajaxDvicesOfficePc');
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxDvicesOfficeMonitor', 'DviceController@ajaxDvicesOfficeMonitor');
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxDvicesOfficePrinter', 'DviceController@ajaxDvicesOfficePrinter');
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxDvicesOfficePos', 'DviceController@ajaxDvicesOfficePos');
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxDvicesOfficeNetwork', 'DviceController@ajaxDvicesOfficeNetwork');
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxDvicesOfficePostal', 'DviceController@ajaxDvicesOfficePostal');
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxDvicesOfficeOther', 'DviceController@ajaxDvicesOfficeOther');
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxDvicesId', 'DviceController@ajaxDvicesId');
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxDvicesNameById', 'DviceController@ajaxDvicesNameById');
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxDviceTypeByName', 'DviceController@ajaxDviceTypeByName');
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxAddDvice', 'DviceController@ajaxAddDvice');
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxEditDvice', 'DviceController@ajaxEditDvice');
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxMoveDvice', 'DviceController@ajaxMoveDvice');
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxDviceToIt', 'DviceController@ajaxDviceToIt');
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxOfficesNames', 'OfficeController@ajaxOfficesNames'); // To lists offices
// Dvices In It page
Route::get('/'.$_ENV["APP_NAME"].'/dvicesInIt', 'DviceController@dvicesInIt',['AuthSessionLogin']);
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxDvicesInIt', 'DviceController@ajaxDvicesInIt'); //ajax datatable
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxDvicesEditInIt', 'DviceController@ajaxDvicesEditInIt');
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxDvicesDeleteInIt', 'DviceController@ajaxDvicesDeleteInIt');
Route::post('/'.$_ENV["APP_NAME"].'/PosDeliverReport', 'DviceController@PosDeliverReport');
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxposDeliver', 'DviceController@ajaxposDeliver');
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxMoveToInIt', 'DviceController@ajaxMoveToInIt');
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxReplacePicesDvice', 'DviceController@ajaxReplacePicesDvice');
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxToTts', 'DviceController@ajaxToTts');
Route::get('/'.$_ENV["APP_NAME"].'/authRepair', 'DviceController@authRepair',['AuthSessionLogin']);
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxResentToOfice', 'DviceController@ajaxResentToOfice');
// Dvices In Tss page
Route::get('/'.$_ENV["APP_NAME"].'/dvicesInTts', 'DviceController@dvicesInTts');
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxDvicesInTts', 'DviceController@ajaxDvicesInTts'); //ajax datatable
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxDvicesEditInTts', 'DviceController@ajaxDvicesEditInTts');
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxResentToIt', 'DviceController@ajaxResentToIt');
// Temp Moved page
Route::get('/'.$_ENV["APP_NAME"].'/temp_moved', 'DviceController@temp_moved',['AuthSessionLogin']);
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxTempMoved', 'DviceController@ajaxTempMoved');
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxResentMovedToOfice', 'DviceController@ajaxResentMovedToOfice');
// All Dvices page
Route::get('/'.$_ENV["APP_NAME"].'/allDvices', 'DviceController@allDvices',['AuthSessionLogin']);
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxAllDvices', 'DviceController@ajaxAllDvices');
// Repair Dvives page
Route::get('/'.$_ENV["APP_NAME"].'/repairDvices', 'DviceController@repairDvices',['AuthSessionLogin']);
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxRepairDvices', 'DviceController@ajaxRepairDvices');
// Moving Dvives page
Route::get('/'.$_ENV["APP_NAME"].'/moveingDvices', 'DviceController@moveingDvices',['AuthSessionLogin']);
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxMoveingDvices', 'DviceController@ajaxMoveingDvices');
// Replace Dvives page
Route::get('/'.$_ENV["APP_NAME"].'/replaceDvices', 'DviceController@replaceDvices',['AuthSessionLogin']);
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxReplaceDvices', 'DviceController@ajaxReplaceDvices');
// Deleted Dvives page
Route::get('/'.$_ENV["APP_NAME"].'/deletedDvices', 'DviceController@deletedDvices',['AuthSessionLogin']);
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxDeletedDvices', 'DviceController@ajaxDeletedDvices');
// All Mission page
Route::get('/'.$_ENV["APP_NAME"].'/allMission', 'MisinController@allMission',['AuthSessionLogin']);
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxAllMission', 'MisinController@ajaxAllMission');
// Vacation page
Route::get('/'.$_ENV["APP_NAME"].'/vacation', 'MisinController@vacation',['AuthSessionLogin']);
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxVacation', 'MisinController@ajaxVacation');
// My Mission page
Route::get('/'.$_ENV["APP_NAME"].'/myMission', 'MisinController@myMission',['AuthSessionLogin']);
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxMyMission', 'MisinController@ajaxMyMission');
Route::get('/'.$_ENV["APP_NAME"].'/misinForm', 'MisinController@misinForm',[]);
Route::post('/'.$_ENV["APP_NAME"].'/misinReport', 'MisinController@misinReport',[]);
// Mission On line page
Route::get('/'.$_ENV["APP_NAME"].'/MissionOnline', 'MisinController@MissionOnline',['AuthSessionLogin']);
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxMissionOnline', 'MisinController@ajaxMissionOnline');
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxAddMissionOnline', 'MisinController@ajaxAddMissionOnline');
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxDelMissionOnline', 'MisinController@ajaxDelMissionOnline');
Route::post('/'.$_ENV["APP_NAME"].'/vactionFormSubOnLine', 'MisinController@vactionFormSubOnLine',['AuthSessionLogin']);
Route::post('/'.$_ENV["APP_NAME"].'/badlRahaFormSubOnLine', 'MisinController@badlRahaFormSubOnLine',['AuthSessionLogin']);
// Missions page
Route::get('/'.$_ENV["APP_NAME"].'/Missions', 'MisinController@Missions',['AuthSessionLogin']);
Route::ajax('/'.$_ENV["APP_NAME"].'/usersInfo', 'UserController@usersInfo');
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxMissions', 'MisinController@ajaxMissions');
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxAddMission', 'MisinController@ajaxAddMission');
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxDelMission', 'MisinController@ajaxDelMission');
// Vaction Form Sub Page
Route::post('/'.$_ENV["APP_NAME"].'/vactionFormSub', 'MisinController@vactionFormSub',['AuthSessionLogin']);
// Reg To page
Route::get('/'.$_ENV["APP_NAME"].'/regTo', 'RegController@regTo',['AuthSessionLogin']);
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxRegTo', 'RegController@ajaxRegTo');
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxAddRegTo', 'RegController@ajaxAddRegTo');
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxRegToEdit', 'RegController@ajaxRegToEdit');
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxRegToDel', 'RegController@ajaxRegToDel');
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxregToAddSub', 'RegController@ajaxregToAddSub');
Route::get('/'.$_ENV["APP_NAME"].'/regToReport', 'RegController@regToReport');
// Reg To Search page
Route::get('/'.$_ENV["APP_NAME"].'/regToSearch', 'RegController@regToSearch',['AuthSessionLogin']);
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxregToSearch', 'RegController@ajaxregToSearch');
// Reg In page
Route::get('/'.$_ENV["APP_NAME"].'/regIn', 'RegController@regIn',['AuthSessionLogin']);
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxRegIn', 'RegController@ajaxRegIn');
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxAddRegIn', 'RegController@ajaxAddRegIn');
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxRegInEdit', 'RegController@ajaxRegInEdit');
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxRegInDel', 'RegController@ajaxRegInDel');
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxregInAddSub', 'RegController@ajaxregInAddSub');
Route::get('/'.$_ENV["APP_NAME"].'/regInReport', 'RegController@regInReport');
// Reg In Search page
Route::get('/'.$_ENV["APP_NAME"].'/regInSearch', 'RegController@regInSearch',['AuthSessionLogin']);
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxregInSearch', 'RegController@ajaxregInSearch');
// Parcel To page
Route::get('/'.$_ENV["APP_NAME"].'/parcelTo', 'RegController@parcelTo',['AuthSessionLogin']);
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxParcelTo', 'RegController@ajaxParcelTo');
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxAddParcelTo', 'RegController@ajaxAddParcelTo');
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxParcelToEdit', 'RegController@ajaxParcelToEdit');
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxParcelToDel', 'RegController@ajaxParcelToDel');
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxParcelToAddSub', 'RegController@ajaxParcelToAddSub');
Route::get('/'.$_ENV["APP_NAME"].'/parcelToReport', 'RegController@parcelToReport');
// Reg In Search page
Route::get('/'.$_ENV["APP_NAME"].'/parcelToSearch', 'RegController@parcelToSearch',['AuthSessionLogin']);
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxParcelToSearch', 'RegController@ajaxParcelToSearch');
// Users Auth page
Route::get('/'.$_ENV["APP_NAME"].'/usersAuth', 'UserController@usersAuth',['AuthSessionLogin']);
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxUsersAuth', 'UserController@ajaxUsersAuth');
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxResetUserPassword', 'UserController@ajaxResetUserPassword');
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxEditUserAuth', 'UserController@ajaxEditUserAuth');
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxAddUser', 'UserController@ajaxAddUser');
Route::ajax('/'.$_ENV["APP_NAME"].'/ajaxEditUser', 'UserController@ajaxEditUser');
// Printer Status
Route::ajax('/it4/ajaxPrinterStatus', 'PrinterController@getValues');
