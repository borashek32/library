<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::orderBy('created_at', 'DESC')->take(10)->get();

        return view('admin.subscriptions.mailings', compact('subscriptions'));
    }

    public function subscriptionsCategory($id)
    {
        $subscriptions = Subscription::where('category_id', $id)
            ->orderBy('created_at', 'DESC')
            ->take(10)
            ->get();

        return view('admin.subscriptions.subscriptions-category', compact('subscriptions'));
    }

    public function destroy($id)
    {
        $subscription = Subscription::where('id', $id)->first();
        $subscription->delete();

        return redirect('dashboard/admin/mailings')
            ->with('success', 'Подписка была успешно удалена.');
    }
}
