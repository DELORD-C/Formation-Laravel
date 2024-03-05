<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReviewController extends Controller
{
    public function index(Request $request): View
    {
        $reviews = Review::paginate(5);

        return view('reviews.list', [
            'reviews' => $reviews
        ])->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create(): View
    {
        return view('reviews.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'body' => 'required',
            'movie' => 'required',
            'rating' => 'required'
        ]);

        $review = new Review($request->all());
        $review->save();

        return redirect(route('review.index'))->with('notif', 'Review successfully created');
    }

    public function show(Review $review): View
    {
        return view('reviews.show', [
            'review' => $review
        ]);
    }

    public function edit(Review $review): View
    {
        return View('reviews.edit', ['review' => $review]);
    }

    public function update(Request $request, Review $review): RedirectResponse
    {
        $request->validate([
            'body' => 'required',
            'movie' => 'required',
            'rating' => 'required'
        ]);

        $review->update($request->all());

        return redirect(route('review.index'))->with('notif', 'Review successfully updated');
    }

    public function destroy(Review $review): RedirectResponse
    {
        $review->delete();

        return redirect(route('review.index'))->with('notif', 'Review successfully destroyed');
    }
}
