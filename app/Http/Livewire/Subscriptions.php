<?php

namespace App\Http\Livewire;

use App\Models\Subscription;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Subscriptions extends Component
{
    use WithPagination;

    public function render()
    {
        $subscriptions = Subscription::latest()
            ->paginate(10);

        return view('admin.subscriptions.mailings', compact('subscriptions'));
    }

    public function subcriptionsCategory($id)
    {
        $category = Category::where('id', $id)->get();
        dd($category->name);

        return view('admin.subscriptions.subscriptions-category', compact('category'));
    }

    public function delete($id)
    {
        Subscription::find($id)->delete();
        session()->flash('message', 'Подписка успешно удалена.');
    }
}
