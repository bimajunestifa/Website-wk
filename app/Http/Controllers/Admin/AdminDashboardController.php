<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Major;
use App\Models\Facility;
use App\Models\News;
use App\Models\ContactMessage;
use App\Models\Partner;
use App\Models\Achievement;
use App\Models\Gallery;
use App\Models\Testimonial;
use App\Models\SchoolCulture;
use App\Models\EducationReport;
use App\Models\SchoolProfile;
use App\Models\Teacher;
use App\Models\Alumni;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'sliders_count' => Slider::count(),
            'majors_count' => Major::count(),
            'teachers_count' => Teacher::count(),
            'achievements_count' => Achievement::count(),
            'galleries_count' => Gallery::count(),
            'testimonials_count' => Testimonial::count(),
            'alumni_count' => Alumni::count(),
            'facilities_count' => Facility::count(),
            'reports_count' => EducationReport::count(),
            'news_count' => News::count(),
            'partners_count' => Partner::count(),
            'cultures_count' => SchoolCulture::count(),
            'messages_unread_count' => ContactMessage::where('is_read', false)->count(),
            'messages_total_count' => ContactMessage::count(),
        ];

        $latestMessages = ContactMessage::orderBy('created_at', 'desc')->take(5)->get();
        $latestNews = News::orderBy('published_at', 'desc')->take(5)->get();
        $sliders = Slider::orderBy('order', 'asc')->get();

        return view('admin.dashboard', compact('stats', 'latestMessages', 'latestNews', 'sliders'));
    }

    public function webSmk()
    {
        $profile = SchoolProfile::first();
        $homeSliders = Slider::where('type', 'home')->orderBy('order')->get();
        if ($homeSliders->isEmpty()) {
            $homeSliders = Slider::orderBy('order')->get();
        }
        $majors = Major::orderBy('order')->get();
        $facilities = Facility::orderBy('order')->get();
        $akhlakActivities = SchoolCulture::where('category', 'akhlak_activity')->orderBy('order')->get();
        $cultures = SchoolCulture::where('category', '!=', 'akhlak_activity')->orderBy('order')->get();
        $achievements = Achievement::orderBy('order')->get();
        $reports = EducationReport::orderBy('order')->get();
        $partners = Partner::orderBy('order')->get();
        $latestNews = News::orderByDesc('published_at')->take(6)->get();
        $galleries = Gallery::orderBy('order')->take(8)->get();
        $teachers = Teacher::orderBy('order')->get();
        $alumnis = Alumni::orderBy('order')->get();
        $testimonials = Testimonial::orderBy('order')->get();

        return view('admin.web_smk', compact(
            'profile',
            'homeSliders',
            'majors',
            'facilities',
            'akhlakActivities',
            'cultures',
            'achievements',
            'reports',
            'partners',
            'latestNews',
            'galleries',
            'teachers',
            'alumnis',
            'testimonials'
        ));
    }

    public function spmbManager()
    {
        $profile = SchoolProfile::first();
        $spmbSliders = Slider::where('type', 'spmb')->orderBy('order')->get();
        if ($spmbSliders->isEmpty()) {
            $spmbSliders = Slider::where('is_active', true)->orderBy('order')->get();
        }
        $testimonials = Testimonial::orderBy('order')->get();
        $achievements = Achievement::orderBy('order')->get();
        $majors = Major::orderBy('order')->get();
        $spmbMessages = ContactMessage::where('subject', 'like', '%SPMB%')
            ->orWhere('subject', 'like', '%Pendaftaran%')
            ->orWhereNull('subject')
            ->orderByDesc('created_at')
            ->take(8)
            ->get();
        $unreadMessagesCount = ContactMessage::where('is_read', false)->count();

        return view('admin.spmb_manager', compact(
            'profile',
            'spmbSliders',
            'testimonials',
            'achievements',
            'majors',
            'spmbMessages',
            'unreadMessagesCount'
        ));
    }
}

