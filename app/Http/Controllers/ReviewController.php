<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();

        return response()->json([
            'status' => 200,
            'message' => 'Reviews retrieved succesfully',
            'data' => $reviews
        ], 200);
    }

    public function store(Request $request)
    {
        $reviews = Review::create($request->all());

        return response()->json([
            'status' => 201,
            'message' => 'Review created succesfully',
            'data' => $reviews
        ], 201);
    }

    public function show($id)
    {
        $reviews = Review::find($id);

        if (!$reviews) {
            return response()->json([
                'status' => 404,
                'message' => 'Review not found',
                'data' => null
            ],404);
        }

        return response()->json([
            'status' => 200,
            'message' => 'Review retrieved succesfully',
            'data' => $reviews
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $reviews = Review::find($id);

        if(!$reviews) {
            return response()->json([
                'status' => 404,
                'message' => 'Review not found',
                'data' => null
            ], 404);
        }

        $request->validate([
            'book_id' => 'required|integer',
            'user_id' => 'required|integer',
            'rating' => 'required|float',
            'comment' => 'required|string',
        ]);
        $reviews->update($request->all());

        return response()->json([
            'status' => 200,
            'message' => 'Review updated succesfully',
            'data' => $reviews
        ], 200);
    }

    public function destroy($id)
    {
        $reviews = Review::find($id);

        if(!$reviews) {
            return response()->json([
                'status' => 404,
                'message' => 'Review not found',
                'data' => null
            ], 404);
        }

        $reviews->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Review deleted succesfully',
            'data' => null
        ], 200);
    }
}
