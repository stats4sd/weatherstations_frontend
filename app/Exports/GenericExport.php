<?php
namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
class GenericExport implements FromQuery, WithMapping, WithHeadings
{
    private $query;
    private $columns;
    private $order;
    public function __construct($query, $bindings)
    {
        $this->query = $query;
        $this->columns = $columns;
        $this->order = $order;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        // if($this->order['direction']) {
        //     return $model::orderBy($this->order['column'],$this->order['direction']);
        // }
        return $this->query->orderBy($this->order['id'],$this->order['direction']);
    }
    public function headings(): array
    {
        return $this->columns;
    }
    public function map($row): array
    {
        $columns = array_map(function($column) use ($row) {
            return $row->$column;
        }
        ,$this->columns);
        return $columns;
    }
}