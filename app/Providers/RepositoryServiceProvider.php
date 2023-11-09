<?php

namespace App\Providers;

use App\Repositories\FeeRepository;
use App\Repositories\GradeRepository;

use App\Repositories\ClasseRepository;
use App\Repositories\ParentRepository;
use App\Repositories\QuizzeRepository;
use App\Repositories\LibraryRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\SectionRepository;
use App\Repositories\SettingRepository;
use App\Repositories\StudentRepository;
use App\Repositories\SubjectRepository;
use App\Repositories\TeacherRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\QuestionRepository;
use App\Repositories\GraduatedRepository;
use App\Repositories\PromotionRepository;
use App\Interfaces\FeeRepositoryInterface;
use App\Repositories\AttendanceRepository;
use App\Repositories\FeeInvoicesRepository;
use App\Interfaces\GradeRepositoryInterface;
use App\Repositories\OnlineClasseRepository;
use App\Interfaces\ClasseRepositoryInterface;
use App\Interfaces\ParentRepositoryInterface;
use App\Interfaces\QuizzeRepositoryInterface;
use App\Repositories\ProcessingFeeRepository;
use App\Interfaces\LibraryRepositoryInterface;
use App\Interfaces\PaymentRepositoryInterface;
use App\Interfaces\SectionRepositoryInterface;
use App\Interfaces\SettingRepositoryInterface;
use App\Interfaces\StudentRepositoryInterface;
use App\Interfaces\SubjectRepositoryInterface;
use App\Interfaces\TeacherRepositoryInterface;
use App\Interfaces\QuestionRepositoryInterface;
use App\Repositories\ReceiptStudentsRepository;
use App\Interfaces\GraduatedRepositoryInterface;
use App\Interfaces\PromotionRepositoryInterface;
use App\Interfaces\AttendanceRepositoryInterface;
use App\Interfaces\FeeInvoicesRepositoryInterface;
use App\Interfaces\OnlineClasseRepositoryInterface;
use App\Interfaces\ProcessingFeeRepositoryInterface;
use App\Interfaces\ReceiptStudentsRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(GradeRepositoryInterface::class, GradeRepository::class);
        $this->app->bind(ClasseRepositoryInterface::class, ClasseRepository::class);
        $this->app->bind(SectionRepositoryInterface::class, SectionRepository::class);
        $this->app->bind(ParentRepositoryInterface::class, ParentRepository::class);
        $this->app->bind(TeacherRepositoryInterface::class, TeacherRepository::class);
        $this->app->bind(StudentRepositoryInterface::class, StudentRepository::class);
        $this->app->bind(PromotionRepositoryInterface::class, PromotionRepository::class);
        $this->app->bind(GraduatedRepositoryInterface::class, GraduatedRepository::class);
        $this->app->bind(FeeRepositoryInterface::class, FeeRepository::class);
        $this->app->bind(FeeInvoicesRepositoryInterface::class, FeeInvoicesRepository::class);
        $this->app->bind(ReceiptStudentsRepositoryInterface::class, ReceiptStudentsRepository::class);
        $this->app->bind(ProcessingFeeRepositoryInterface::class, ProcessingFeeRepository::class);
        $this->app->bind(PaymentRepositoryInterface::class, PaymentRepository::class);
        $this->app->bind(AttendanceRepositoryInterface::class, AttendanceRepository::class);
        $this->app->bind(SubjectRepositoryInterface::class, SubjectRepository::class);
        $this->app->bind(QuizzeRepositoryInterface::class, QuizzeRepository::class);
        $this->app->bind(QuestionRepositoryInterface::class, QuestionRepository::class);
        $this->app->bind(LibraryRepositoryInterface::class, LibraryRepository::class);
        $this->app->bind(SettingRepositoryInterface::class, SettingRepository::class);
        $this->app->bind(OnlineClasseRepositoryInterface::class, OnlineClasseRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
