<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Sold;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Item List';
        $CreateItem = 'Create Item';
        // Eloquent queries
        $types = Type::all();
        $items = Item::leftJoin('types', 'items.type_id', '=', 'types.id')
            ->select('items.*', 'items.id as item_id', 'types.type as type_name')
            ->get();
        // $item = Item::find($id);

        return view('items.index', [
            'pageTitle' => $pageTitle,
            'items' => $items,
            'CreateItem' => $CreateItem,
            'types' => $types,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function addStock(Request $request, string $id)
    {
        $messages = [
            'required' => 'The :attribute field is required.',
            'numeric' => 'The :attribute field must be a number.'
        ];
        $validator = Validator::make($request->all(), [
            'stockAmount' => 'required|numeric',
        ], $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Eloquent
        $item = Item::find($id);

        // Check if the item exists
        if (!$item) {
            return response()->json(['message' => 'Item not found'], 404);
        }

        // Update the stock amount
        $stockAmount = $request->input('stockAmount');
        $item->qty += $stockAmount;
        $item->save();

        return redirect()->route('items.index');
    }
    /**
     * Store a newly created resource in storage.
     */
    // ItemController.php

    public function store(Request $request)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'numeric' => 'Isi :attribute dengan angka',
            'image' => 'File harus berupa gambar',
            'mimes' => 'File harus memiliki format jpeg, png, jpg, atau gif',
            'max' => 'Ukuran file tidak boleh lebih dari :max kilobytes',
        ];

        $validator = Validator::make($request->all(), [
            'itemName' => 'required',
            'itemPrice' => 'required|numeric',
            'itemStock' => 'required',
            'itemType' => 'required',
            'itemImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Add validation for the image
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Get the last item code
        $lastItem = Item::orderBy('code_item', 'desc')->first();

        // Check if there are any existing items
        if ($lastItem) {
            // Extract the numeric part from the last item code and increment it by 1
            $lastItemNumber = (int) substr($lastItem->code_item, 4); // Assuming the format is "ITEMxxx"
            $newItemNumber = $lastItemNumber + 1;
        } else {
            // If no existing items, set the new item number to 0
            $newItemNumber = 0;
        }

        // Generate the new item code
        $newItemCode = 'ITEM' . str_pad($newItemNumber, 3, '0', STR_PAD_LEFT);

        // Store the uploaded image
        if ($request->hasFile('itemImage')) {
            $imagePath = $request->file('itemImage')->store('items', 'public');
        } else {
            // Handle the case when no image is uploaded
            return redirect()->back()->withErrors(['itemImage' => 'The image field is required.'])->withInput();
        }

        // Create a new item using Eloquent model and save it to the database
        $item = new Item();
        $item->code_item = $newItemCode;
        $item->name_item = $request->itemName;
        $item->price = $request->itemPrice;
        $item->qty = $request->itemStock;
        $item->type_id = $request->itemType;
        $item->image = $imagePath; // Save the image path in the database
        $item->save();
        // Create a new sold item using Eloquent model and save it to the database
        $soldItem = new Sold();
        $soldItem->name = $request->itemName;
        $soldItem->stock = $request->itemStock;
        $soldItem->purchase_price = $request->itemBuy;
        $soldItem->selling_price = $request->itemPrice; // Assuming the selling price is the same as the purchase price initially
        $soldItem->date = now(); // Assuming the sold date is the current date and time
        $soldItem->save();


        return redirect()->route('items.index')->with('toast_success', 'Task Created Successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pageTitle = 'Edit item';
        // Eloquent
        $types = Type::all();
        $item = Item::find($id);

        // Check if the item exists
        if (!$item) {
            return response()->json(['message' => 'Item not found'], 404);
            // or redirect back with an error message
            // return redirect()->back()->withErrors(['Item not found']);
        }

        return view('items.index', [
            'pageTitle' => $pageTitle,
            'types' => $types,
            'item' => $item,
            'CreateItem' => 'Edit Item' // Use a different label for the submit button when editing an item
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'email' => 'Isi :attribute dengan format yang benar',
            'numeric' => 'Isi :attribute dengan angka'
        ];
        $validator = Validator::make($request->all(), [
            'itemName' => 'required',
            'itemPrice' => 'required|numeric',
        ], $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // ELOQUENT
        $item = Item::find($id);
        $item->name_item = $request->itemName;
        $item->price = $request->itemPrice;
        $item->save();
        return redirect()->route('items.index');
    }
    public function getData(Request $request)
    {
        $items = item::with('type');

        if ($request->ajax()) {
            return datatables()->of($items)
                ->addIndexColumn()
                ->addColumn('actions', function ($item) {
                    return view('items.actions', compact('items'));
                })
                ->toJson();
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // QUERY BUILDER
        $item = Item::find($id);

        if ($item) {
            // Setelah konfirmasi, lakukan penghapusan item
            $item->delete();

            // Redirect kembali ke halaman daftar item setelah penghapusan berhasil
            return redirect()->route('items.index')->with('success', 'Item has been deleted.');
        } else {
            return redirect()->route('items.index')->with('error', 'Item not found.');
        }
    }


}
