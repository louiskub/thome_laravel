<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{

    use HasFactory;

    protected $fillable = [
    'name', 'bedrooms', 'bathrooms', 'area', 'car_park', 'location', 'type',
    'floors', 'year_built', 'nearby_places', 'image', 'price', 'maid_room',
    
    // ระบบสุขาภิบาล
    'has_septic_tank', 'spec_septic_tank',
    'has_order_trap', 'spec_order_trap',
    'has_grase_trap', 'spec_grase_trap',
    'has_water_tank', 'spec_water_tank',
    'has_water_pump', 'spec_water_pump',
    'has_pipe_termites', 'spec_pipe_termites',

    // หลังคา
    'has_solar_roof', 'spec_solar_roof',
    'has_insulation', 'spec_insulation',
    'has_roof_ventilator', 'spec_roof_ventilator',

    // ระบบไฟฟ้า
    'has_electric_meter', 'spec_electric_meter',
    'has_main_breaker', 'spec_main_breaker',
    'has_rcd', 'spec_rcd',
    'has_ev_charger', 'spec_ev_charger',
    'has_emergency_light', 'spec_emergency_light',
    'has_door_automatic', 'spec_door_automatic',
    'has_smoke_detector', 'spec_smoke_detector',
    'has_rcd_1st', 'spec_rcd_1st',
    'has_rcd_2nd', 'spec_rcd_2nd',
    'has_heat_detector', 'spec_heat_detector',
    'has_smart_home', 'spec_smart_home',
    'has_security_system', 'spec_security_system',
    'has_cctv', 'spec_cctv',
    'has_door_bell', 'spec_door_bell',
    'has_plug_switch', 'spec_plug_switch',
    'has_garage_door', 'spec_garage_door',
];


}