<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Article;
use App\Models\Bot;
use App\Models\Category;
use App\Models\Company;
use App\Models\FakeTransaction;
use App\Models\Faq;
use App\Models\Plan;
use App\Models\Team;
use App\Models\Testimonial;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Support\Facades\Storage;

class GuestPagesController extends Controller
{
        public function index(){
            $articles = Article::orderByDesc('id')->limit(3)->get();
            $testimonials= Testimonial::orderByDesc('id')->limit(5)->get();            
            $company= Company::first();             
            $plans = Plan::all();           
            return view('guest.index')->with([
            'testimonials'=>$testimonials,'articles'=>$articles,
            'company'=>$company,'plans'=>$plans
            ]);
        }

        public function about(){
            $company= Company::first();
            $members = Team::all();            
            $articles = Article::orderByDesc('created_at')->limit(3)->get();
            return view('guest.about')->with(['company'=>$company,'articles'=>$articles, 'members' => $members]);
        }        

        public function testimonials($id = null){
            $testimonials = Testimonial::all();                              
            return view('guest.testimonials')->with(['testimonials'=>$testimonials]);
        }

        public function faqs(){            
            $faqs = Faq::all();
            $half = ceil($faqs->count() / 2);
            $firstfaqs = Faq::limit($half)->get();
            $secondfaqs = Faq::skip($half)->take($half)->get();
            $articles=Article::limit(3)->get(); 
            return view('guest.faqs')->with([
                'firstfaqs'=>$firstfaqs,
                'secondfaqs'=>$secondfaqs,
                'articles'=>$articles
            ]);
        }       

        public function contact(){
            $company= Company::first();
            $firstfaqs = Faq::limit(3)->get();
            $secondfaqs = Faq::skip(3)->take(3)->get();  
            return view('guest.contact')->with(['company'=>$company,'firstfaqs'=>$firstfaqs,'secondfaqs'=>$secondfaqs]);
        }      
           
        public function articles($id = null){
            $artwithcomments = Article::withCount('articlecomments')
            ->has('articlecomments', '>=', 5)
            ->orderByDesc('articlecomments_count')
            ->get();
            $categories = Category::all();
            if($id != null){
                $articles = Article::where('category_id',$id)->inRandomOrder()->get();
                if(count($articles)>0){
                    return view('guest.articles')->with(['articles'=>$articles,
                    'categories'=>$categories,'artwithcomments'=>$artwithcomments]);
                }else{
                    $articles = Article::orderByDesc('id')->paginate(6);          
                    return view('guest.articles')->with(['articles'=>$articles,
                    'categories'=>$categories,'artwithcomments'=>$artwithcomments]);
                }               
            }else{
                $articles = Article::orderByDesc('id')->paginate(6);          
                return view('guest.articles')->with(['articles'=>$articles,
                'categories'=>$categories,'artwithcomments'=>$artwithcomments]);
            }       
        }

        public function readarticle($id){
            $article = Article::find($id);
            $artswithcomments = Article::where('id','!=',$article->id)
            ->withCount('articlecomments')
            ->has('articlecomments', '>=', 2)
            ->orderByDesc('articlecomments_count')
            ->get();
            
            
            $categories = Category::withCount('article')->orderByDesc('article_count')->get();
            return view('guest.readarticle')->with(['article'=>$article,
            'categories'=>$categories,'artswithcomments'=>$artswithcomments,]);
        }

        public function pricing(){
            $testimonials = Testimonial::inRandomOrder()->limit(3)->get();
            $plans = Plan::all();
            $company= Company::first();               
            $firstfaqs = Faq::limit(3)->get();
            $secondfaqs = Faq::skip(3)->take(3)->get();         
            return view('guest.pricing')->with(['plans'=>$plans,'testimonials'=>$testimonials,'company'=>$company,
            'firstfaqs'=>$firstfaqs,'secondfaqs'=>$secondfaqs]);
        }
       
        public function getCertificate()
        {
            $company = Company::first();
            $name = 'BLUESTECH LTD Certficate.pdf';
            $headers = array(
                'Content-Type: application/pdf',
              );
            return Storage::download('public/'.$company->certificate, $name,$headers);
        }  
        
        public function getPdf()
        {
            $company = Company::first();
            $name = 'BLUESTECH LTD.pdf';
            $headers = array(
                'Content-Type: application/pdf',
              );
            return Storage::download('public/'.$company->pdf, $name,$headers);
        }  

        public function exchange(){
            return view('guest.exchange');
        }

        public function markets(){
            return view('guest.markets');
        }

        public function projector(){
            return view('guest.projector');
        }

        public function ukrain(){
            return view('guest.ukrain');
        }

        public function transactions(){
            $faketrans = FakeTransaction::orderByDesc('created_at')->take(10)->get();
            return view('guest.transactions')->with('faketrans',$faketrans);
        }

        public function artemis(){
            $bots = Bot::all(); 
            return view('guest.artemis')->with('bots',$bots);
        }
}
