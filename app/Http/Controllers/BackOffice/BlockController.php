<?php

namespace App\Http\Controllers\BackOffice;

use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Routing\Controller;
use App\Models\Block;
use Illuminate\Http\Request;
use Str;
/**
 * Class DashboardController.
 */
class BlockController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $blocks =  Block::all();
        return view('backend.blocks.index', compact('blocks'));        
    }

    public function edit(Block $block)
    {
        return view('backend.blocks.edit', compact('block'));                
    }

    public function update(Block $block, Request $request)
    {
        $block->block_value = $request->block_value;
        $block->save();
        return redirect(route('backoffice.blocks.edit', $block->id))->with('success', 'Block updated!');
    }
}
