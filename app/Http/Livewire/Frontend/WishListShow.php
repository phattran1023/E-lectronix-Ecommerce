<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Cart;
use Livewire\Component;
use App\Models\Wishlist;

class WishListShow extends Component
{
    public function removeWishlistItem(int $wishlistId)
    {
        Wishlist::where('user_id', auth()->user()->id)->where('id',$wishlistId)->delete();

        //Livewire firing event for wishlist
        $this->emit('wishlistAddedUpdated');

        
        $this->dispatchBrowserEvent('message',[
            'text' => 'Wish items removed',
            'type' => 'success',
            'status' => 200
        ]);
    }

    public function render()
    {
        $wishlist = []; // Initialize the $wishlist variable as an empty array

        // Check if the user is authenticated before accessing the wishlist
        if (auth()->check()) {
            $wishlist = Wishlist::where('user_id', auth()->user()->id)->get();
            $cart = Cart::where('user_id', auth()->user()->id)->get();
        }
        
        
        return view('livewire.frontend.wish-list-show', ['wishlist' => $wishlist, 'cart' => $cart]);
    }
}
