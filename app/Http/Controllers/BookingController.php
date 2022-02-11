<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Interfaces\ApiResultInterface;
use App\Models\Booking;

class BookingController extends Controller
{
    private $apiResultService;

    public function __construct(ApiResultInterface $apiResultService)
    {
        $this->apiResultService = $apiResultService;
    }

    /**
     * Display a listing of Bookings.
     *
     * @return array
     */
    public function index(): array
    {
        $bookings = Booking::all();
        return $this->apiResultService->makeResult(compact('bookings'));
    }

    /**
     * Store a newly created Booking in storage.
     *
     * @param BookingRequest $request
     * @return array
     */
    public function store(BookingRequest $request): array
    {
        $booking = Booking::query()->create($request->validated());
        return $this->apiResultService->makeResult(compact('booking'));
    }

    /**
     * Display Booking.
     *
     * @param Booking $booking
     * @return array
     */
    public function show(Booking $booking): array
    {
        return $this->apiResultService->makeResult(compact('booking'));
    }

    /**
     * Update Booking in storage.
     *
     * @param BookingRequest $request
     * @param Booking $booking
     * @return array
     */
    public function update(BookingRequest $request, Booking $booking): array
    {
        $booking->update($request->validated());
        return $this->apiResultService->makeResult(compact('booking'));
    }

    /**
     * Remove Booking from storage.
     *
     * @param Booking $booking
     * @return array
     */
    public function destroy(Booking $booking): array
    {
        $success = $booking->delete();
        return $this->apiResultService->makeResult(compact('success'));
    }
}
