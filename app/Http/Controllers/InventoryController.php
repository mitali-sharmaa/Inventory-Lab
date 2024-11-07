// app/Http/Controllers/InventoryController.php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    // Display the list of all inventory items
    public function index()
    {
        $items = Inventory::all();  // Fetch all inventory items
        return view('inventory.index', compact('items'));  // Return view with items
    }

    // Show the form to create a new inventory item
    public function create()
    {
        return view('inventory.create');  // Return the create view
    }

    // Store a new inventory item
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        Inventory::create($request->all());  // Save new item to the database

        return redirect()->route('inventory.index')->with('success', 'Inventory item added successfully.');
    }

    // Show the form to edit an existing inventory item
    public function edit($id)
    {
        $item = Inventory::findOrFail($id);  // Fetch the item by its ID
        return view('inventory.edit', compact('item'));  // Return the edit view
    }

    // Update the specified inventory item
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $item = Inventory::findOrFail($id);  // Find the item to update
        $item->update($request->all());  // Update the item

        return redirect()->route('inventory.index')->with('success', 'Inventory item updated successfully.');
    }

    // Delete the specified inventory item
    public function destroy($id)
    {
        $item = Inventory::findOrFail($id);  // Find the item to delete
        $item->delete();  // Delete the item

        return redirect()->route('inventory.index')->with('success', 'Inventory item deleted successfully.');
    }
}
