<?php

namespace App\Repositories\Company;

use App\Helper\Helper;

use App\Models\Company;
use Illuminate\Support\Facades\Storage;

class CompanyRepository implements CompanyInterface
{
    use Helper;
    protected $company;

    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    public function getMainCompany()
    {
        $request = request();
        return $this->company->latest()->filter($request)->paginate(5);
    }

    public function store($data)
    {
        return $this->company->create($data);
    }

    public function getById($id)
    {
        return $this->company->findOrFail($id);
    }

    public function update($id, $data)
    {
        $company = Company::findOrFail($id); // Fetch the company by ID
        return $company->update($data); // Update the company with new data
    }

    public function delete($id)
    {
        $company = $this->company->findOrFail($id);
        if ($company->products->first()) {
            return back()->with('danger', 'يوجد منتجات لهذه الشركه');
        }

        $image = $company->image;
        // Delete the old image from storage
        if ($image) {
            Storage::disk('public')->delete($image);
        }
        return $company->delete();
    }
}
