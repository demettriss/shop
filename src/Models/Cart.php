<?php

namespace Jerex\Shop\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    private array $_items;

    /**
     * @param array $items
     */
    public function __construct(array $items = [])
    {
        foreach ($items as $item) {
            $this->set($item);
        }
    }

    /**
     * @return array
     */
    public function items(): array
    {
        return $this->_items;
    }

    /**
     * @param mixed $item
     * @return $this
     */
    public function set(mixed $item): static
    {
        if (is_object($item) && isset($item->id)) {
            $this->_items[$item->id] = $item;
        } elseif (mb_strlen($item) == '36' && ($item_uuid = Item::where('uuid', $item)->first())) {
            $this->_items[$item_uuid->id] = $item_uuid;
        } elseif ($item_id = Item::find($item)) {
            $this->_items[$item_id->id] = $item_id;
        }
        return $this;
    }

    public function sum(): int|float
    {
        $sum = 0;
        foreach ($this->_items as $item) {
            $sum += $item->price() ?? 0;
        }
        return $sum;
    }
}
