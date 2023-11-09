<?php

namespace App\Repositories;
use App\Models\Grade;
use App\Models\Classe;
use App\Models\Promotion;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use App\Interfaces\PromotionRepositoryInterface;


class PromotionRepository implements PromotionRepositoryInterface{


    // get all Promotions
    public function getAllPromotions(){
         $grades = Grade::all();
        return view('pages.students.promotions.index',compact('grades'));
    }

    public function create(){
       $promotions = Promotion::all();
        return view('pages.students.promotions.management',compact('promotions'));
    }

    // StorePromotions
    public function StorePromotions($request){
        DB::beginTransaction();
        try {
        $students = Student::where('grade_id',$request->grade_id)->where('classe_id',$request->classe_id)->where('section_id',$request->section_id)->where('academic_year',$request->academic_year)->get();
             if($students->count() < 1){
                return redirect()->back()->with('error_promotions',trans('Students_trans.msgStudent'));
            }
            // update in table student
            foreach ($students as $student){
                $ids = explode(',',$student->id);
                Student::whereIn('id', $ids)
                    ->update([
                        'grade_id'=>$request->to_grade_id,
                        'classe_id'=>$request->to_classe_id,
                        'section_id'=>$request->to_section_id,
                        'academic_year'=>$request->academic_year_new,
                    ]);
                // insert in to promotions
                Promotion::updateOrCreate([
                    'student_id'=>$student->id,
                    'from_grade'=>$request->grade_id,
                    'from_Classe'=>$request->classe_id,
                    'from_section'=>$request->section_id,
                    'to_grade'=>$request->to_grade_id,
                    'to_Classe'=>$request->to_classe_id,
                    'to_section'=>$request->to_section_id,
                    'academic_year'=>$request->academic_year,
                    'academic_year_new'=>$request->academic_year_new,
                ]);
            }
            DB::commit();
            flash()->addSuccess(trans('messages.success'));
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    // DeletePromotions
    public function DeletePromotion($request){
        DB::beginTransaction();
        try {
            // التراجع عن الكل
            if($request->page_id ==1){
             $promotions = Promotion::all();
             foreach ($promotions as $promotion){
                 //التحديث في جدول الطلاب
                 $ids = explode(',',$promotion->student_id);
                 student::whereIn('id', $ids)
                 ->update([
                 'grade_id'=>$promotion->from_grade,
                 'classe_id'=>$promotion->from_Classe,
                 'section_id'=> $promotion->from_section,
                 'academic_year'=>$promotion->academic_year,
               ]);
                 //حذف جدول الترقيات
                 Promotion::truncate();
             }
                DB::commit();
                flash()->addError(trans('messages.Delete'));
                return redirect()->back();
            }
            else{
                $promotion = Promotion::findorfail($request->promotion_id);
                Student::where('id', $promotion->student_id)
                    ->update([
                        'grade_id'=>$promotion->from_grade,
                        'classe_id'=>$promotion->from_Classe,
                        'section_id'=> $promotion->from_section,
                        'academic_year'=>$promotion->academic_year,
                    ]);
                Promotion::destroy($request->promotion_id);
                DB::commit();
                flash()->addError(trans('messages.Delete'));
                return redirect()->back();
            }
        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
