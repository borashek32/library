<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategorySubscription;
use App\Models\CategoryUser;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    // Вывод всех подписок пользователя в его личном кабинете
    public function index()
    {
        // Получаем пользователя
        $user = Auth::user();
        // Получаем все категории в личном кабинете, так как там реализован механизм подписки
        $categories = Category::all();
        // Выводим все подписки пользователя по его id
        $subscriptions = Subscription::where('user_id', $user->id)
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        return view('profile.subscriptions.index', compact('subscriptions', 'categories'));
    }

    public function store(Request $request)
    {
        // Получаем из представления все id рубрики из checkbox
        $category_id = $request->input('category_id');
        // Получаем пользователя
        $user = Auth::user();
        // Получаем все подписки пользователя
        $user_subscriptions = $user->subscriptions;

        // В цикле перебираем все подписки пользователя
        foreach ($user_subscriptions as $user_subscription) {

            // Сравниваем id каждой рубрики с id рубрики, на которую пользователь уже подписан
            if ($category_id == $user_subscription->category_id) {

                // Если условие верно, то выдаем ошибку, что пользователь уже подписан на рубрику
                return back()->with('error', 'Вы не можете повторно подписаться на рубрику');
            }
        }
        // Если условие не выполнено, подписываем пользователя на рубрику
        Subscription::create([
            'user_id' => Auth::user()->id,
            'category_id' => $category_id,
            'email' => $request->email
        ]);

        return back()->with('success', 'Ваш адрес успешно добавлен в список рассылки');
    }

    public function destroy(Subscription $subscription)
    {
        $subscription->delete();

        if (session()->has('error')) {
            return back()->with('error', 'Что-то пошло не так');
        }

        return back()->with('success', 'Вы успешно отписались от рассылки');
    }
}
