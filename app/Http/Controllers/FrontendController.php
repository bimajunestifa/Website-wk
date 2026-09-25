<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\SchoolProfile;
use App\Models\VisionMission;
use App\Models\Major;
use App\Models\Facility;
use App\Models\EducationReport;
use App\Models\SchoolCulture;
use App\Models\Partner;
use App\Models\News;
use App\Models\ContactMessage;
use App\Models\Achievement;
use App\Models\Gallery;
use App\Models\Testimonial;
use App\Models\Teacher;
use App\Models\Alumni;
use App\Models\HomeFeatureCard;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('type', 'home')->where('is_active', true)->orderBy('order', 'asc')->get();
        if ($sliders->isEmpty()) {
            $sliders = Slider::where('is_active', true)->orderBy('order', 'asc')->get();
        }
        $profile = SchoolProfile::first();
        $visionMission = VisionMission::first();
        $majors = Major::where('is_active', true)->orderBy('order', 'asc')->get();
        $reports = EducationReport::orderBy('order', 'asc')->get();
        $facilities = Facility::orderBy('order', 'asc')->take(8)->get();
        $cultures = SchoolCulture::orderBy('order', 'asc')->get();
        $partners = Partner::orderBy('order', 'asc')->get();
        $achievements = Achievement::orderBy('order', 'asc')->take(6)->get();
        $galleries = Gallery::orderBy('order', 'asc')->take(8)->get();
        $latestNews = News::where('is_published', true)->orderBy('published_at', 'desc')->take(8)->get();
        if ($latestNews->isEmpty()) {
            $latestNews = News::orderBy('published_at', 'desc')->take(8)->get();
        }
        $news = $latestNews;
        $characterCards = HomeFeatureCard::where('section', 'karakter')->where('is_active', true)->orderBy('order', 'asc')->get();
        $cultureCards = HomeFeatureCard::where('section', 'budaya')->where('is_active', true)->orderBy('order', 'asc')->get();
        $learningCards = HomeFeatureCard::where('section', 'pembelajar')->where('is_active', true)->orderBy('order', 'asc')->get();

        return view('home', compact(
            'sliders',
            'profile',
            'visionMission',
            'majors',
            'reports',
            'facilities',
            'cultures',
            'partners',
            'achievements',
            'galleries',
            'latestNews',
            'news',
            'characterCards',
            'cultureCards',
            'learningCards'
        ));
    }

    public function spmb()
    {
        $sliders = Slider::where('type', 'spmb')->where('is_active', true)->orderBy('order', 'asc')->get();
        if ($sliders->isEmpty()) {
            $sliders = Slider::where('is_active', true)->orderBy('order', 'asc')->get();
        }
        $profile = SchoolProfile::first();
        $visionMission = VisionMission::first();
        $majors = Major::where('is_active', true)->orderBy('order', 'asc')->get();
        $testimonials = Testimonial::where('is_active', true)->orderBy('order', 'asc')->get();
        $achievements = Achievement::where('is_featured', true)->orderBy('order', 'asc')->get();
        if ($achievements->isEmpty()) {
            $achievements = Achievement::orderBy('order', 'asc')->orderByDesc('created_at')->take(6)->get();
        }

        return view('spmb', compact('sliders', 'profile', 'visionMission', 'majors', 'testimonials', 'achievements'));
    }

    public function submitSpmbMessage(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'no_wa' => 'nullable|string|max:50',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:100',
            'message' => 'required|string',
        ]);

        ContactMessage::create([
            'name' => $validated['name'],
            'phone' => $validated['no_wa'] ?? $validated['phone'] ?? null,
            'email' => $validated['email'] ?? null,
            'subject' => 'Pendaftaran / Pesan SPMB',
            'message' => $validated['message'],
        ]);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Pesan telah berhasil dikirim!'
            ]);
        }

        return back()->with('success', 'Pesan pendaftaran Anda telah berhasil dikirim ke panitia SPMB!');
    }

    public function majors()
    {
        $profile = SchoolProfile::first();
        $majors = Major::where('is_active', true)->orderBy('order', 'asc')->get();
        return view('majors', compact('profile', 'majors'));
    }

    public function majorDetail($slug)
    {
        $profile = SchoolProfile::first();
        $major = Major::where('slug', $slug)->firstOrFail();
        $otherMajors = Major::where('id', '!=', $major->id)->where('is_active', true)->orderBy('order', 'asc')->get();
        return view('major-detail', compact('profile', 'major', 'otherMajors'));
    }

    public function resources()
    {
        $profile = SchoolProfile::first();
        $facilities = Facility::orderBy('order', 'asc')->get();
        $galleries = Gallery::orderBy('order', 'asc')->get();
        $teachers = Teacher::where('is_active', true)->orderBy('order', 'asc')->get();
        $alumnis = Alumni::where('is_active', true)->orderBy('order', 'asc')->get();
        $testimonials = $alumnis;
        return view('resources', compact('profile', 'facilities', 'galleries', 'teachers', 'alumnis', 'testimonials'));
    }

    public function culture()
    {
        $profile = SchoolProfile::first();
        $cultures = SchoolCulture::where('category', 'budaya')->orderBy('order', 'asc')->get();
        if ($cultures->isEmpty()) {
            $cultures = SchoolCulture::where('category', '!=', 'akhlak_activity')->orderBy('order', 'asc')->get();
        }
        $akhlakActivities = SchoolCulture::where('category', 'akhlak_activity')->orderBy('order', 'asc')->get();
        $visionMission = VisionMission::first();
        return view('culture', compact('profile', 'cultures', 'akhlakActivities', 'visionMission'));
    }

    public function news(Request $request)
    {
        $profile = SchoolProfile::first();
        $query = News::orderBy('published_at', 'desc');
        if ($request->has('kategori') && $request->kategori) {
            $query->where('category', $request->kategori);
        }
        $news = $query->paginate(12);
        return view('news', compact('profile', 'news'));
    }

    public function newsDetail($slug)
    {
        $profile = SchoolProfile::first();
        $article = News::where('slug', $slug)->orWhere('id', $slug)->firstOrFail();
        $news = $article;
        $recentNews = News::where('id', '!=', $article->id)->where('is_published', true)->orderBy('published_at', 'desc')->take(4)->get();
        return view('news-detail', compact('profile', 'article', 'news', 'recentNews'));
    }

    public function about()
    {
        $profile = SchoolProfile::first();
        $visionMission = VisionMission::first();
        $reports = EducationReport::orderBy('order', 'asc')->get();
        $partners = Partner::orderBy('order', 'asc')->get();
        $achievements = Achievement::orderBy('order', 'asc')->get();
        return view('about', compact('profile', 'visionMission', 'reports', 'partners', 'achievements'));
    }

    public function sendMessage(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        ContactMessage::create($validated);

        return back()->with('success', 'Pesan Anda berhasil dikirim! Tim SMK Wikrama 1 Garut akan segera menghubungi Anda.');
    }
}
