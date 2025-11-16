<?php

if (!function_exists('formatCurrency')) {
    /**
     * Format currency to Indonesian Rupiah format
     * 
     * @param float $amount
     * @return string
     */
    function formatCurrency($amount) {
        return 'Rp ' . number_format($amount, 0, ',', '.');
    }
}