<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class UsersExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles, WithMapping
{
    public function __construct(
        public string $startDate,
        public string $endDate
    ){}

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Nome',
            'Email',
            'Data Verificação Do Email',
            'Data da Criação',
            'Data de Atualização'
        ];
    }

    public function collection()
    {
        return User::whereBetween('created_at', [$this->startDate, $this->endDate])->get();
    }

    public function map($user): array
    {
        return [
            $user->id,
            $user->name,
            $user->email,
            $user->email_verified_at->format('d/m/Y'),
            $user->created_at->format('d/m/Y'),
            $user->updated_at->format('d/m/Y'),
        ];
    }
}
