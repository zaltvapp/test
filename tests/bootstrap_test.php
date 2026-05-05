<?php
/**
 * Basic test harness for the Brazuca WHMCS module.
 * Verifies that the module loads correctly and all expected functions are defined.
 */

// Define WHMCS constant so the module doesn't die()
define("WHMCS", true);

// Mock logModuleCall (WHMCS function used by the module)
function logModuleCall($module, $function, $params, $message, $trace) {
    // no-op for testing
}

// Include the module
require_once __DIR__ . '/../modules/servers/brazuca/brazuca.php';

$expected_functions = [
    'isJson',
    'brazuca_MetaData',
    'brazuca_ConfigOptions',
    'brazuca_CreateAccount',
    'brazuca_Renew',
    'brazuca_SuspendAccount',
    'brazuca_UnsuspendAccount',
    'brazuca_AdminServicesTabFields',
    'brazuca_ClientArea',
];

$all_passed = true;

echo "=== Brazuca WHMCS Module Test Suite ===\n\n";

// Test 1: All expected functions exist
echo "Test 1: Verifying all expected functions are defined...\n";
foreach ($expected_functions as $func) {
    if (function_exists($func)) {
        echo "  [PASS] $func() exists\n";
    } else {
        echo "  [FAIL] $func() NOT found\n";
        $all_passed = false;
    }
}

// Test 2: MetaData returns expected structure
echo "\nTest 2: Verifying brazuca_MetaData() returns correct structure...\n";
$meta = brazuca_MetaData();
if (is_array($meta) && isset($meta['DisplayName']) && $meta['DisplayName'] === 'Brazuca.tv') {
    echo "  [PASS] DisplayName = 'Brazuca.tv'\n";
} else {
    echo "  [FAIL] Unexpected MetaData structure\n";
    $all_passed = false;
}
if (isset($meta['APIVersion']) && $meta['APIVersion'] === '1.0') {
    echo "  [PASS] APIVersion = '1.0'\n";
} else {
    echo "  [FAIL] APIVersion mismatch\n";
    $all_passed = false;
}

// Test 3: ConfigOptions returns expected fields
echo "\nTest 3: Verifying brazuca_ConfigOptions() returns correct fields...\n";
$config = brazuca_ConfigOptions();
if (is_array($config) && count($config) === 2) {
    echo "  [PASS] ConfigOptions returns 2 fields\n";
} else {
    echo "  [FAIL] ConfigOptions should return 2 fields\n";
    $all_passed = false;
}
if (isset($config['Login do painel Brazuca.tv'])) {
    echo "  [PASS] Login field present\n";
} else {
    echo "  [FAIL] Login field missing\n";
    $all_passed = false;
}
if (isset($config['Senha do painel Brazuca.tv'])) {
    echo "  [PASS] Password field present\n";
} else {
    echo "  [FAIL] Password field missing\n";
    $all_passed = false;
}

// Test 4: isJson helper function
echo "\nTest 4: Testing isJson() helper...\n";
if (isJson('{"key":"value"}') === true) {
    echo "  [PASS] Valid JSON detected\n";
} else {
    echo "  [FAIL] Valid JSON not detected\n";
    $all_passed = false;
}
if (isJson('not json') === false) {
    echo "  [PASS] Invalid JSON rejected\n";
} else {
    echo "  [FAIL] Invalid JSON not rejected\n";
    $all_passed = false;
}
if (isJson('') === false) {
    echo "  [PASS] Empty string rejected\n";
} else {
    echo "  [FAIL] Empty string not rejected\n";
    $all_passed = false;
}

// Summary
echo "\n=== Test Summary ===\n";
if ($all_passed) {
    echo "ALL TESTS PASSED\n";
    exit(0);
} else {
    echo "SOME TESTS FAILED\n";
    exit(1);
}
