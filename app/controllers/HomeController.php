<?php

use Item\Repositories\ItemRepositoryInterface;

class HomeController extends BaseController {

	protected $ItemRepository;

	public function __construct(ItemRepositoryInterface $ItemRepository){

		$this->items = $ItemRepository;
		
	}

	public function getIndex()
	{
		$items = $this->items->getOwnItem(Auth::user());

		return View::make('home',array(
			'items' => $items
		));
	}

	public function postIndex()
	{
		$id = Input::get('id');
		$item = Item::findOrFail($id);

		if ( $this->items->isOwnItem($item ,Auth::user())){

			$item->mark();
		}

		return Redirect::route('home');
	}

	public function getNew()
	{
		return View::make('new');
	}

	public function postNew()
	{
		$rules = array('name' => 'required|min:3|max:255');

		$validator = Validator::make(Input::all(),$rules);

		if($validator->fails()){
			return Redirect::route('new')->withErrors($validator);
		}

		$item = new Item;
		$item->owner_id = Auth::user()->id;
		$item->name = Input::get('name');
		$item->save();

		return Redirect::route('home');
	}

	public function getDelete($task){

		$task = Item::where('id', $task)->first();

		if ( $this->items->isOwnItem($task ,Auth::user())){

			$task->delete();
		}

		return Redirect::route('home');
	}

}
