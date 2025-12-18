<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
<<<<<<< HEAD
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Return a success response
     */
    protected function successResponse($data = null, $message = 'Success', $status = 200)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data
        ], $status);
    }

    /**
     * Return an error response
     */
    protected function errorResponse($message = 'Error', $status = 400, $errors = null)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'errors' => $errors
        ], $status);
    }

    /**
     * Handle file upload
     */
    protected function handleFileUpload(Request $request, $fieldName, $directory = 'uploads', $disk = 'public')
    {
        if ($request->hasFile($fieldName)) {
            $file = $request->file($fieldName);

            // Validate file
            $validator = Validator::make($request->all(), [
                $fieldName => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            if ($validator->fails()) {
                return ['error' => 'Invalid file type or size'];
            }

            // Generate unique filename
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            // Store file
            $path = $file->storeAs($directory, $filename, $disk);

            return ['path' => $path, 'filename' => $filename];
        }

        return null;
    }

    /**
     * Delete file from storage
     */
    protected function deleteFile($path, $disk = 'public')
    {
        if ($path && Storage::disk($disk)->exists($path)) {
            Storage::disk($disk)->delete($path);
            return true;
        }
        return false;
    }

    /**
     * Get file URL
     */
    protected function getFileUrl($path, $disk = 'public')
    {
        return $path ? Storage::disk($disk)->url($path) : null;
    }

    /**
     * Validate request data
     */
    protected function validateRequest(Request $request, array $rules, array $messages = [])
    {
        return $request->validate($rules, $messages);
    }

    /**
     * Flash success message
     */
    protected function flashSuccess($message)
    {
        session()->flash('success', $message);
    }

    /**
     * Flash error message
     */
    protected function flashError($message)
    {
        session()->flash('error', $message);
    }

    /**
     * Get current user role
     */
    protected function getCurrentUserRole()
    {
        return auth()->check() ? auth()->user()->role : null;
    }

    /**
     * Check if current user has specific role
     */
    protected function hasRole($role)
    {
        return auth()->check() && auth()->user()->role === $role;
    }

    /**
     * Paginate results with search
     */
    protected function paginateWithSearch($query, Request $request, $perPage = 10)
    {
        $search = $request->get('search');

        if ($search) {
            $query->where(function($q) use ($search) {
                // Add searchable fields here
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        return $query->paginate($perPage);
    }

    /**
     * Enhanced API success response with metadata
     */
    protected function apiSuccessResponse($data = null, $message = 'Success', $status = 200, $additionalData = [])
    {
        $response = [
            'success' => true,
            'message' => $message,
            'timestamp' => now()->toISOString(),
            'data' => $data
        ];

        // Add pagination metadata if data is paginated
        if ($data instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator) {
            $response['pagination'] = [
                'current_page' => $data->currentPage(),
                'last_page' => $data->lastPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
                'from' => $data->firstItem(),
                'to' => $data->lastItem(),
                'has_more_pages' => $data->hasMorePages(),
                'prev_page_url' => $data->previousPageUrl(),
                'next_page_url' => $data->nextPageUrl(),
            ];
        }

        // Merge additional data
        $response = array_merge($response, $additionalData);

        return response()->json($response, $status);
    }

    /**
     * Enhanced API error response with detailed error information
     */
    protected function apiErrorResponse($message = 'Error', $status = 400, $errors = null, $errorCode = null)
    {
        $response = [
            'success' => false,
            'message' => $message,
            'timestamp' => now()->toISOString(),
        ];

        if ($errors) {
            $response['errors'] = $errors;
        }

        if ($errorCode) {
            $response['error_code'] = $errorCode;
        }

        return response()->json($response, $status);
    }

    /**
     * API validation error response
     */
    protected function apiValidationErrorResponse($validator, $message = 'Validation failed')
    {
        return $this->apiErrorResponse($message, 422, $validator->errors());
    }

    /**
     * API not found response
     */
    protected function apiNotFoundResponse($message = 'Resource not found')
    {
        return $this->apiErrorResponse($message, 404, null, 'RESOURCE_NOT_FOUND');
    }

    /**
     * API unauthorized response
     */
    protected function apiUnauthorizedResponse($message = 'Unauthorized access')
    {
        return $this->apiErrorResponse($message, 401, null, 'UNAUTHORIZED');
    }

    /**
     * API forbidden response
     */
    protected function apiForbiddenResponse($message = 'Access forbidden')
    {
        return $this->apiErrorResponse($message, 403, null, 'FORBIDDEN');
    }

    /**
     * Flexible pagination with multiple search fields and filters
     */
    protected function flexiblePaginate($query, Request $request, $perPage = 10, $searchFields = [], $filterFields = [])
    {
        // Handle search
        $search = $request->get('search');
        if ($search && !empty($searchFields)) {
            $query->where(function($q) use ($search, $searchFields) {
                foreach ($searchFields as $field) {
                    $q->orWhere($field, 'like', "%{$search}%");
                }
            });
        }

        // Handle filters
        foreach ($filterFields as $field) {
            $filterValue = $request->get("filter_{$field}");
            if ($filterValue !== null && $filterValue !== '') {
                $query->where($field, $filterValue);
            }
        }

        // Handle sorting
        $sortBy = $request->get('sort_by', 'created_at');
        $sortDirection = $request->get('sort_direction', 'desc');

        // Validate sort direction
        $sortDirection = in_array(strtolower($sortDirection), ['asc', 'desc']) ? $sortDirection : 'desc';

        $query->orderBy($sortBy, $sortDirection);

        // Handle per page
        $perPage = $request->get('per_page', $perPage);
        $perPage = min(max($perPage, 1), 100); // Limit between 1 and 100

        return $query->paginate($perPage);
    }

    /**
     * Advanced search with multiple conditions
     */
    protected function advancedSearch($query, Request $request, $searchConfig = [])
    {
        // Text search
        if ($request->has('q') && !empty($searchConfig['fields'])) {
            $searchTerm = $request->get('q');
            $query->where(function($q) use ($searchTerm, $searchConfig) {
                foreach ($searchConfig['fields'] as $field) {
                    $q->orWhere($field, 'like', "%{$searchTerm}%");
                }
            });
        }

        // Date range filters
        if ($request->has('date_from') && !empty($searchConfig['date_fields'])) {
            $dateFrom = $request->get('date_from');
            foreach ($searchConfig['date_fields'] as $field) {
                $query->where($field, '>=', $dateFrom);
            }
        }

        if ($request->has('date_to') && !empty($searchConfig['date_fields'])) {
            $dateTo = $request->get('date_to');
            foreach ($searchConfig['date_fields'] as $field) {
                $query->where($field, '<=', $dateTo);
            }
        }

        // Status filters
        if ($request->has('status') && !empty($searchConfig['status_field'])) {
            $status = $request->get('status');
            $query->where($searchConfig['status_field'], $status);
        }

        // Custom filters
        if (!empty($searchConfig['custom_filters'])) {
            foreach ($searchConfig['custom_filters'] as $filter) {
                $value = $request->get($filter['param']);
                if ($value !== null) {
                    $query->where($filter['field'], $filter['operator'] ?? '=', $value);
                }
            }
        }

        return $query;
    }

    /**
     * Export data to CSV
     */
    protected function exportToCsv($data, $filename, $headers = [])
    {
        $callback = function() use ($data, $headers) {
            $file = fopen('php://output', 'w');

            // Write headers
            if (!empty($headers)) {
                fputcsv($file, $headers);
            }

            // Write data
            foreach ($data as $row) {
                if (is_object($row)) {
                    $row = (array) $row;
                }
                fputcsv($file, $row);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ]);
    }

    /**
     * Handle bulk operations
     */
    protected function handleBulkOperation(Request $request, $model, $operation, $ids = null)
    {
        $ids = $ids ?? $request->get('ids', []);

        if (empty($ids)) {
            return $this->apiErrorResponse('No items selected for bulk operation', 400);
        }

        try {
            switch ($operation) {
                case 'delete':
                    $model::whereIn('id', $ids)->delete();
                    $message = count($ids) . ' items deleted successfully';
                    break;

                case 'activate':
                    $model::whereIn('id', $ids)->update(['status' => 'active']);
                    $message = count($ids) . ' items activated successfully';
                    break;

                case 'deactivate':
                    $model::whereIn('id', $ids)->update(['status' => 'inactive']);
                    $message = count($ids) . ' items deactivated successfully';
                    break;

                default:
                    return $this->apiErrorResponse('Invalid bulk operation', 400);
            }

            return $this->apiSuccessResponse(null, $message);

        } catch (\Exception $e) {
            return $this->apiErrorResponse('Bulk operation failed: ' . $e->getMessage(), 500);
        }
    }
=======
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
>>>>>>> 448fa31e99d3fefb055225e06c71d8e6a4cce79e
}
