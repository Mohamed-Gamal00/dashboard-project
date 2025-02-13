<?php

namespace App\Http\Controllers\Dashboard;

use App\Helper\Helper;
use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Company\CompanyRequest;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use App\Repositories\Company\CompanyRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class CompaniesController extends Controller
{

    use Helper;


    public $companyRepo;

    public function __construct(CompanyRepository $repo)
    {
        $this->companyRepo = $repo;
    }

    /**
     * Display a listing of the companies.
     */
    public function index()
    {

        // Fetch companies
        $companies = $this->companyRepo->getMainCompany();
        if (count($companies) > 0) {
            if ($companies->total() > $companies->perPage()) {
                $data = [
                    'records' => CompanyResource::collection($companies),
                    'pagination links' => [
                        'current page' => $companies->currentPage(),
                        'per page' => $companies->perPage(),
                        'total' => $companies->total(),
                        'links' => [
                            'first' => $companies->url(1),
                            'last' => $companies->url($companies->lastPage())
                        ],
                    ],
                ];
            } else {
                $data = CompanyResource::collection($companies);
            }
            return ApiResponse::sendResponse(200, 'Data Retrieved Successfully', $data);
        }
        return ApiResponse::sendResponse(200, 'No Data Available', []);
    }

    /**
     * Store a newly created company in storage.
     */
    public function store(CompanyRequest $request)
    {

        $data = $request->validated();

        // Handle the uploaded image
        $data['image'] = $this->uploadedImage($request, 'image', 'companies');

        // Store the company
        $company = $this->companyRepo->store($data);

        // Return success response
        return response()->json([
            'message' => 'success created',
            'data' => $company
        ], 201);
    }

    /**
     * Show the specified company.
     */
    public function show(string $id)
    {
        // Fetch the company by ID
        $company = $this->companyRepo->getById($id);
        // Return the company data
        return response()->json([
            'data' => new CompanyResource($company)
        ]);
    }

    /**
     * Update the specified company in storage.
     */
    public function update(CompanyRequest $request, string $id)
    {
        $data = $request->validated();


        // Fetch the company
        $company = $this->companyRepo->getById($id);

        $oldImage = $company->image;
        $newImage = $this->uploadedImage($request, 'image', 'companies');

        // Replace the image if a new one is uploaded
        if ($newImage) {
            $data['image'] = $newImage;
        }

        // Delete the old image from storage
        if ($newImage && $oldImage) {
            Storage::disk('public')->delete($oldImage);
        }
        // return $data;

        // Update the company
        $this->companyRepo->update($id, $data);

        // // Return the updated company data
        return response()->json([
            'message' => 'update success',
            'data' => $data
        ]);
    }

    /**
     * Remove the specified company from storage.
     */
    public function destroy(string $id)
    {
        // Delete the company
        $this->companyRepo->delete($id);

        // Return success message
        return response()->json([
            'message' => 'deleted succesfully'
        ]);
    }
}
