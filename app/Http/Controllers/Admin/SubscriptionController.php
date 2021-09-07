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
        $subscriptions = Subscription::latest()
            ->paginate(10);

        return view('admin.subscriptions.mailings', compact('subscriptions'));
    }

    public function subscriptionsCategory($id)
    {
        $category = Category::where('id', $id)->first();

        return view('admin.subscriptions.subscriptions-category', compact('category'));
    }

    public function destroy($id)
    {
        $subscription = Subscription::where('id', $id)->first();
        $subscription->delete();

        return redirect('dashboard/admin/mailings')
            ->with('success', 'Подписка была успешно удалена.');
    }
}
