<?php


namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Validation\ValidationException;

class ShopController extends Controller
{
        public function saveData(Request $request)
    {
        try {
            $this->authorize('create', Shop::class);

            $request->validate([
                'name' => 'required|string|max:255',
                'latitude' => 'required|string|max:255',
                'longitude' => 'required|string|max:255',
            ]);

            $formData = new Shop;
            $formData->name = $request->name;
            $formData->latitude = $request->latitude;
            $formData->longitude = $request->longitude;
            $formData->save();

            return response()->json(['success' => true, 'message' => 'Data saved successfully']);
        } catch (AuthorizationException $e) {
            return response()->json(['success' => false, 'message' => 'Only admin can add shop'], 403);
        } catch (ValidationException $e) {
            return response()->json(['success' => false, 'message' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error saving data to the database'], 500);
        }
    }
}
