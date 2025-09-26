<?php

namespace App\Controllers;

use App\Models\OrderModel;

class BarcodeController extends BaseController
{
    public function generateOrderBarcode($orderId)
    {
        $orderModel = new OrderModel();
        $order = $orderModel->find($orderId);
        
        if (!$order) {
            return redirect()->back()->with('error', 'Order not found');
        }
        
        // Check if user has permission to view this order
        $userRole = session()->get('role');
        $userId = session()->get('id');
        
        if ($userRole === 'customer' && $order['user_id'] != $userId) {
            return redirect()->back()->with('error', 'Unauthorized access');
        }
        
        $barcodeData = "ORDER-" . str_pad($orderId, 8, '0', STR_PAD_LEFT);
        
        return view('barcode/generate', [
            'title' => 'Order Barcode',
            'barcodeData' => $barcodeData,
            'order' => $order
        ]);
    }
    
    public function scanBarcode()
    {
        return view('barcode/scan', [
            'title' => 'Scan Barcode'
        ]);
    }
    
    public function processBarcode()
    {
        $barcodeData = $this->request->getPost('barcode');
        
        if (strpos($barcodeData, 'ORDER-') === 0) {
            $orderId = (int) str_replace('ORDER-', '', $barcodeData);
            $orderModel = new OrderModel();
            $order = $orderModel->find($orderId);
            
            if ($order) {
                $userRole = session()->get('role');
                if ($userRole === 'admin') {
                    return redirect()->to(site_url('admin/orders'))->with('success', "Order #{$orderId} found - Status: {$order['status']}");
                } elseif ($userRole === 'staff') {
                    return redirect()->to(site_url("staff/orders/{$orderId}/status"))->with('success', "Order #{$orderId} loaded for status update");
                } elseif ($userRole === 'customer' && $order['user_id'] == session()->get('id')) {
                    return redirect()->to(site_url("customer/orders/{$orderId}"))->with('success', "Order #{$orderId} details loaded");
                }
            }
        }
        
        return redirect()->back()->with('error', 'Invalid or unauthorized barcode');
    }
}