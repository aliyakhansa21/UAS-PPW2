<?php

namespace App\Exports;

use App\Models\Application;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ApplicationsExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Application::with(['user', 'job'])->get()->map(function ($application) {
            return [
                'id' => $application->id,
                'applicant_name' => $application->user->name,
                'applicant_email' => $application->user->email,
                'job_title' => $application->job->title,
                'company' => $application->job->company,
                'status' => $application->status,
                'created_at' => $application->created_at->toDateString(),
            ];
        });
    }

    /**
     * Map each application row for export.
     */
    public function map($application): array
    {
        return [
            $application['applicant_name'],
            $application['job_title'],
            $application['status']
        ];
    }

    /**
     * Define header columns for the exported file.
     */
    public function headings(): array
    {
        return [
            'ID',
            'Nama Pelamar',
            'Email Pelamar',
            'Judul Lowongan',
            'Perusahaan',
            'Status',
            'Tanggal Dibuat',
        ];
    }
}
