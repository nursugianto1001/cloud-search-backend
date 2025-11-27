<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Definition;
use Illuminate\Http\Request;

class DefinitionController extends Controller
{
    // GET /api/definitions
    public function index()
    {
        $definitions = Definition::orderBy('term')->get();

        return response()->json([
            'success' => true,
            'data' => $definitions,
        ]);
    }

    // GET /api/definitions/{id}
    public function show($id)
    {
        $definition = Definition::find($id);

        if (! $definition) {
            return response()->json([
                'success' => false,
                'message' => 'Definition not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $definition,
        ]);
    }

    // POST /api/definitions
    public function store(Request $request)
    {
        $validated = $request->validate([
            'term' => 'required|string|max:255',
            'definition' => 'required|string',
        ]);

        $definition = Definition::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Definition created',
            'data' => $definition,
        ], 201);
    }

    // PUT/PATCH /api/definitions/{id}
    public function update(Request $request, $id)
    {
        $definition = Definition::find($id);

        if (! $definition) {
            return response()->json([
                'success' => false,
                'message' => 'Definition not found',
            ], 404);
        }

        $validated = $request->validate([
            'term' => 'sometimes|required|string|max:255',
            'definition' => 'sometimes|required|string',
        ]);

        $definition->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Definition updated',
            'data' => $definition,
        ]);
    }

    // DELETE /api/definitions/{id}
    public function destroy($id)
    {
        $definition = Definition::find($id);

        if (! $definition) {
            return response()->json([
                'success' => false,
                'message' => 'Definition not found',
            ], 404);
        }

        $definition->delete();

        return response()->json([
            'success' => true,
            'message' => 'Definition deleted',
        ]);
    }

    // GET /api/search?q=...
    public function search(Request $request)
    {
        $query = $request->input('q', '');

        if (strlen($query) < 2) {
            return response()->json([
                'success' => true,
                'count' => 0,
                'results' => [],
            ]);
        }

        $results = Definition::where('term', 'LIKE', "%{$query}%")
            ->orWhere('definition', 'LIKE', "%{$query}%")
            ->get();

        return response()->json([
            'success' => true,
            'count' => $results->count(),
            'results' => $results,
        ]);
    }
}
