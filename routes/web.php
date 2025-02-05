<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SuperuserController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\UserroleController;
use App\Http\Controllers\DashboardmarketingController;
use App\Http\Controllers\DashboardfinanceController;
use App\Http\Controllers\DashboardoperationController;
use App\Http\Controllers\DashboardadminController;
use App\Http\Controllers\DashboardexecutiveController;
use App\Http\Controllers\ProfilecompanyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AccountserviceController;
use App\Http\Controllers\CompanyuserController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\MedicinestockController;
use App\Http\Controllers\ToothserviceController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ToothcheckupController;
use App\Http\Controllers\MedicinecheckupController;
use App\Http\Controllers\MedicalrecordController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ToothschemaController;
use App\Http\Controllers\ToothconditionController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\InvoiceController;

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\SocialmediaController;
use App\Http\Controllers\FeatureserviceController;
use App\Http\Controllers\CompanyrecordController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\WhyController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\SubscriptionpaymentController;
use App\Http\Controllers\SubscriptioninfoController;

use App\Http\Controllers\LangController;


// Role Public
Route::controller(ProfilecompanyController::class)->group(function () {
    Route::get('', 'index')->name('profilecompany');   
    Route::post('emailsend', 'store')->name('profilecompany.store');
    Route::post('infosubscription', 'infosubscription')->name('profilecompany.infosubscription'); 
});

// Role Middleare Auth - Login Register
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
    Route::get('login', 'login')->name('login');
    Route::get('loginguest', 'loginguest')->name('loginguest');
    Route::post('login', 'loginAction')->name('login.action');
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

// Role Middleare Auth - Forgot Password
Route::controller(ForgotPasswordController::class)->prefix('forgotpassword')->group(function () {
    Route::get('forgotpassword', 'showForgetPasswordForm')->name('forgotpassword');
    Route::post('submitForgetPasswordForm', 'submitForgetPasswordForm')->name('forgotpassword.submitForgetPasswordForm');
    Route::get('reset-password/{token}', 'showResetPasswordForm')->name('forgotpassword.showResetPasswordForm'); 
    Route::post('submitResetPasswordForm', 'submitResetPasswordForm')->name('forgotpassword.submitResetPasswordForm'); 
});

// Role Middleare Auth - Edit Profile & Profile Photo
Route::middleware('auth')->group(function () {
    Route::controller(DashboardController::class)->prefix('dashboards')->group(function () {
        Route::get('dashboard', 'index')->name('dashboards');
    });
    Route::controller(ProfileController::class)->prefix('profiles')->group(function () {
        Route::put('updateprofile/{id}', 'updateprofile')->name('profiles.updateprofile');
        Route::put('updatephotoprofile/{id}', 'updatephotoprofile')->name('profiles.updatephotoprofile');
    });
    Route::controller(ChangePasswordController::class)->prefix('changepassword')->group(function () {
        Route::post('changepassword', 'store')->name('changepassword.store');
    });
    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
    Route::get('/password', [App\Http\Controllers\AuthController::class, 'password'])->name('password');
});

// Role Middleware Marketing
Route::middleware('auth')->group(function () {
    Route::middleware('activecompany:1')->group(function () {
        Route::middleware('activeacc:1')->group(function () {
            Route::middleware('verifiedacc:1')->group(function () {
                Route::middleware('role:marketing')->group(function () {
                    Route::controller(DashboardmarketingController::class)->prefix('dashboardmarketings')->group(function () {
                        Route::get('', 'index')->name('dashboardmarketings');
                    });
                });
            });
        });
    });
});

// Role Middleware Operation
Route::middleware('auth')->group(function () {
    Route::middleware('activecompany:1')->group(function () {
        Route::middleware('activeacc:1')->group(function () {
            Route::middleware('verifiedacc:1')->group(function () {
                Route::middleware('role:operation')->group(function () {
                    Route::controller(DashboardoperationController::class)->prefix('dashboardoperations')->group(function () {
                        Route::get('', 'index')->name('dashboardoperations');
                    });
                });
            });
        });
    });
});

// Role Middleware Finance
Route::middleware('auth')->group(function () {
    Route::middleware('activecompany:1')->group(function () {
        Route::middleware('activeacc:1')->group(function () {
            Route::middleware('verifiedacc:1')->group(function () {
                Route::middleware('role:finance')->group(function () {
                    Route::controller(DashboardfinanceController::class)->prefix('dashboardfinances')->group(function () {
                        Route::get('', 'index')->name('dashboardfinances');
                    });
                });
            });
        });
    });
});

// Role Middleware Admin
Route::middleware('auth')->group(function () {
    Route::middleware('activecompany:1')->group(function () {
        Route::middleware('activeacc:1')->group(function () {   
            Route::middleware('verifiedacc:1')->group(function () {
                Route::middleware('role:admin')->group(function () {
                    Route::controller(DashboardadminController::class)->prefix('dashboardadmins')->group(function () {
                        Route::get('', 'index')->name('dashboardadmins');
                    });
                });
            });
        });
    });
});

// Role Middleware Admin & Executive
Route::middleware('auth')->group(function () {
    Route::middleware('activecompany:1')->group(function () {
        Route::middleware('activeacc:1')->group(function () {
            Route::middleware('verifiedacc:1')->group(function () {
                Route::middleware('role:admin|executive')->group(function () {
                    Route::controller(ProductController::class)->prefix('products')->group(function () {
                        Route::get('', 'index')->name('products');
                        Route::get('create', 'create')->name('products.create');
                        Route::post('store', 'store')->name('products.store');
                        Route::get('edit/{id}', 'edit')->name('products.edit');
                        Route::put('edit/{id}', 'update')->name('products.update');
                        Route::delete('destroy/{id}', 'destroy')->name('products.destroy');
                    });

                    Route::controller(SupplierController::class)->prefix('suppliers')->group(function () {
                        Route::get('', 'index')->name('suppliers');
                        Route::get('/filter','filter')->name('suppliers.filter');
                        Route::get('exportexcel','exportexcel')->name('suppliers.exportexcel');
                        Route::get('export-list','export-list')->name('suppliers.listExport');
                        Route::post('/export-selected','exportSelectedRows')->name('suppliers.selected');
                        Route::get('/print-excel', 'printExcel')->name('print.excel');
                        Route::get('generate-pdf', 'generatePDF')->name('print.excelpdf');
                        Route::get('/download-export/{filename}', function ($filename) {return response()->download(storage_path("app/public/exports/{$filename}"));})->name('export.download');
                        Route::get('create', 'create')->name('suppliers.create');
                        Route::post('store', 'store')->name('suppliers.store');
                        Route::get('edit/{id}', 'edit')->name('suppliers.edit');
                        Route::put('edit/{id}', 'update')->name('suppliers.update');
                        Route::delete('destroy/{id}', 'destroy')->name('suppliers.destroy');
                    });

                    Route::controller(MedicinestockController::class)->prefix('medicinestocks')->group(function () {
                        Route::get('', 'index')->name('medicinestocks');
                        Route::get('create', 'create')->name('medicinestocks.create');
                        Route::post('store', 'store')->name('medicinestocks.store');
                        Route::get('edit/{id}', 'edit')->name('medicinestocks.edit');
                        Route::put('edit/{id}', 'update')->name('medicinestocks.update');
                        Route::delete('destroy/{id}', 'destroy')->name('medicinestocks.destroy');
                    });

                    Route::controller(ToothserviceController::class)->prefix('toothservices')->group(function () {
                        Route::get('', 'index')->name('toothservices');
                        Route::get('create', 'create')->name('toothservices.create');
                        Route::post('store', 'store')->name('toothservices.store');
                        Route::get('edit/{id}', 'edit')->name('toothservices.edit');
                        Route::put('edit/{id}', 'update')->name('toothservices.update');
                        Route::delete('destroy/{id}', 'destroy')->name('toothservices.destroy');
                    });

                    Route::controller(CustomerController::class)->prefix('customers')->group(function () {
                        Route::get('', 'index')->name('customers');
                        Route::get('create', 'create')->name('customers.create');
                        Route::post('store', 'store')->name('customers.store');
                        Route::get('edit/{id}', 'edit')->name('customers.edit');
                        Route::put('edit/{id}', 'update')->name('customers.update');
                        Route::delete('destroy/{id}', 'destroy')->name('customers.destroy');
                    });

                    Route::controller(ToothcheckupController::class)->prefix('toothcheckups')->group(function () {
                        Route::get('', 'index')->name('toothcheckups');
                        Route::get('create', 'create')->name('toothcheckups.create');
                        Route::post('store', 'store')->name('toothcheckups.store');
                        Route::get('edit/{id}', 'edit')->name('toothcheckups.edit');
                        Route::put('edit/{id}', 'update')->name('toothcheckups.update');
                        Route::delete('destroy/{id}', 'destroy')->name('toothcheckups.destroy');
                        Route::get('generatetooth/{id}', 'generatetooth')->name('toothcheckups.generatetooth');
                    });

                    Route::controller(MedicinecheckupController::class)->prefix('medicinecheckups')->group(function () {
                        Route::get('', 'index')->name('medicinecheckups');
                        Route::get('create', 'create')->name('medicinecheckups.create');
                        Route::post('store', 'store')->name('medicinecheckups.store');
                        Route::get('edit/{id}', 'edit')->name('medicinecheckups.edit');
                        Route::put('edit/{id}', 'update')->name('medicinecheckups.update');
                        Route::delete('destroy/{id}', 'destroy')->name('medicinecheckups.destroy');
                    });

                    Route::controller(MedicalrecordController::class)->prefix('medicalrecords')->group(function () {
                        Route::get('', 'index')->name('medicalrecords');
                        Route::get('detail/{id}', 'detail')->name('medicalrecords.detail');
                    });

                    Route::controller(TransactionController::class)->prefix('transactions')->group(function () {
                        Route::get('', 'index')->name('transactions');
                        Route::get('export', 'export')->name('transactions.export');
                    });

                    Route::controller(ToothschemaController::class)->prefix('toothschemas')->group(function () {
                        Route::get('editschema/{id}', 'editschema')->name('toothschemas.editschema');
                        Route::put('editschema/{id}', 'toothconditionupdate')->name('toothschemas.toothconditionupdate');
                    });

                    Route::controller(ToothconditionController::class)->prefix('toothconditions')->group(function () {
                        Route::get('', 'index')->name('toothconditions');
                        Route::get('create', 'create')->name('toothconditions.create');
                        Route::post('store', 'store')->name('toothconditions.store');
                        Route::get('edit/{id}', 'edit')->name('toothconditions.edit');
                        Route::put('edit/{id}', 'update')->name('toothconditions.update');
                        Route::delete('destroy/{id}', 'destroy')->name('toothconditions.destroy');
                    });

                    Route::controller(PurchaseController::class)->prefix('purchases')->group(function () {
                        Route::get('', 'index')->name('purchases');
                        Route::get('create', 'create')->name('purchases.create');
                        Route::post('store', 'store')->name('purchases.store');
                        Route::get('edit/{id}', 'edit')->name('purchases.edit');
                        Route::put('edit/{id}', 'update')->name('purchases.update');
                        Route::delete('destroy/{id}', 'destroy')->name('purchases.destroy');
                    });

                    Route::controller(InvoiceController::class)->prefix('invoices')->group(function () {
                        Route::get('create', 'create')->name('invoices.create');
                        Route::post('store', 'store')->name('invoices.store');
                        Route::get('edit/{id}', 'edit')->name('invoices.edit');
                        Route::put('edit/{id}', 'update')->name('invoices.update');
                        Route::delete('destroy/{id}', 'destroy')->name('invoices.destroy');

                        Route::get('detail/{id}', 'detail')->name('invoices.detail');
                        Route::post('toothcheckup', 'toothcheckup')->name('invoices.toothcheckup');
                        Route::delete('toothdestroy/{id}', 'toothdestroy')->name('invoices.toothdestroy');

                        Route::post('medicinecheckup', 'medicinecheckup')->name('invoices.medicinecheckup');
                        Route::delete('medicinedestroy/{id}', 'medicinedestroy')->name('invoices.medicinedestroy');

                        Route::get('emailtocustomer/{id}', 'emailtocustomer')->name('invoices.emailtocustomer');
                    });

                });
            });
        });
    });


});

// Role Middleware Exceutive
Route::middleware('auth')->group(function () {
    Route::middleware('role:executive')->group(function () {
        Route::controller(DashboardexecutiveController::class)->prefix('dashboardexecutives')->group(function () {
            Route::get('', 'index')->name('dashboardexecutives');
        });

        Route::controller(SubscriptioninfoController::class)->prefix('subscriptioninfos')->group(function () {
            Route::get('', 'index')->name('subscriptioninfos');
            Route::put('payment/{id}', 'payment')->name('subscriptioninfos.payment');
        });

        Route::middleware('activecompany:1')->group(function () {
            Route::middleware('activeacc:1')->group(function () {
                Route::middleware('verifiedacc:1')->group(function () {
                    Route::controller(CompanyController::class)->prefix('companydatas')->group(function () {
                        Route::get('edit/{id}', 'edit')->name('companydatas.edit');
                        Route::put('edit/{id}', 'update')->name('companydatas.update');
                    });
                    Route::middleware('servicecompany:3')->group(function () {
                        Route::controller(EmployeeController::class)->prefix('employees')->group(function () {
                            Route::get('', 'index')->name('employees');
                            Route::get('edit/{id}', 'edit')->name('employees.edit');
                            Route::put('edit/{id}', 'update')->name('employees.update');
                            Route::get('create', 'create')->name('employees.create');
                            Route::post('registeremployee', 'registeremployee')->name('employees.registeremployee');
                        });
                    });
                });
            });
        });
    });
});

// Role Supperuser
Route::middleware(['auth', 'role:superuser'])->group(function () {
    Route::middleware('activeacc:1')->group(function () {
        Route::middleware('verifiedacc:1')->group(function () {
            Route::controller(SuperuserController::class)->prefix('superusers')->group(function () {
                Route::get('', 'index')->name('superusers');
                Route::get('edit/{id}', 'edit')->name('superusers.edit');
                Route::put('edit/{id}', 'update')->name('superusers.update');
                Route::delete('destroy/{id}', 'destroy')->name('superusers.destroy');
            });

            Route::controller(UserroleController::class)->prefix('userroles')->group(function () {
                Route::get('', 'index')->name('userroles');
                Route::get('create', 'create')->name('userroles.create');
                Route::post('store', 'store')->name('userroles.store');
                Route::get('edit/{id}', 'edit')->name('userroles.edit');
                Route::put('edit/{id}', 'update')->name('userroles.update');
                Route::delete('destroy/{id}', 'destroy')->name('userroles.destroy');
            });

            Route::controller(CompanyuserController::class)->prefix('companyusers')->group(function () {
                Route::get('', 'index')->name('companyusers');
                Route::get('create', 'create')->name('companyusers.create');
                Route::post('store', 'store')->name('companyusers.store');
                Route::get('edit/{id}', 'edit')->name('companyusers.edit');
                Route::put('edit/{id}', 'update')->name('companyusers.update');
                Route::delete('destroy/{id}', 'destroy')->name('companyusers.destroy');
                Route::get('notifysubscription/{id}', 'notifysubscription')->name('companyusers.notifysubscription');
            });

            Route::controller(EmailController::class)->prefix('emails')->group(function () {
                Route::get('', 'index')->name('emails');
                Route::delete('destroy/{id}', 'destroy')->name('emails.destroy');
            });


        });
    });
});


