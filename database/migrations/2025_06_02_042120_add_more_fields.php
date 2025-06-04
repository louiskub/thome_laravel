<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
  {
    Schema::table('houses', function (Blueprint $table) {
       $table->integer('maid_room')->nullable();

        // Sanitary
        $table->boolean('has_septic_tank')->nullable();
        $table->text('spec_septic_tank')->nullable();

        $table->boolean('has_order_trap')->nullable();
        $table->text('spec_order_trap')->nullable();

        $table->boolean('has_grase_trap')->nullable();
        $table->text('spec_grase_trap')->nullable();

        $table->boolean('has_water_tank')->nullable();
        $table->text('spec_water_tank')->nullable();

        $table->boolean('has_water_pump')->nullable();
        $table->text('spec_water_pump')->nullable();

        $table->boolean('has_pipe_termites')->nullable();
        $table->text('spec_pipe_termites')->nullable();

        // Roofing
        $table->boolean('has_solar_roof')->nullable();
        $table->text('spec_solar_roof')->nullable();

        $table->boolean('has_insulation')->nullable();
        $table->text('spec_insulation')->nullable();

        $table->boolean('has_roof_ventilator')->nullable();
        $table->text('spec_roof_ventilator')->nullable();

        // Electrical
        $table->boolean('has_electric_meter')->nullable();
        $table->text('spec_electric_meter')->nullable();

        $table->boolean('has_main_breaker')->nullable();
        $table->text('spec_main_breaker')->nullable();

        $table->boolean('has_rcd')->nullable();
        $table->text('spec_rcd')->nullable();

        $table->boolean('has_ev_charger')->nullable();
        $table->text('spec_ev_charger')->nullable();

        $table->boolean('has_emergency_light')->nullable();
        $table->text('spec_emergency_light')->nullable();

        $table->boolean('has_door_automatic')->nullable();
        $table->text('spec_door_automatic')->nullable();

        $table->boolean('has_smoke_detector')->nullable();
        $table->text('spec_smoke_detector')->nullable();

        $table->boolean('has_rcd_1st')->nullable();
        $table->text('spec_rcd_1st')->nullable();

        $table->boolean('has_rcd_2nd')->nullable();
        $table->text('spec_rcd_2nd')->nullable();

        $table->boolean('has_heat_detector')->nullable();
        $table->text('spec_heat_detector')->nullable();

        $table->boolean('has_smart_home')->nullable();
        $table->text('spec_smart_home')->nullable();

        $table->boolean('has_security_system')->nullable();
        $table->text('spec_security_system')->nullable();

        $table->boolean('has_cctv')->nullable();
        $table->text('spec_cctv')->nullable();

        $table->boolean('has_door_bell')->nullable();
        $table->text('spec_door_bell')->nullable();

        $table->boolean('has_plug_switch')->nullable();
        $table->text('spec_plug_switch')->nullable();

        $table->boolean('has_garage_door')->nullable();
        $table->text('spec_garage_door')->nullable();
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
public function down()
{
    Schema::table('houses', function (Blueprint $table) {
        $table->dropColumn([
            // ราคาบ้าน และข้อมูลทั่วไป
            'price', 'area', 'bedrooms', 'bathrooms', 'car_park', 'maid_room',

            // สุขาภิบาล Sanitary
            'has_septic_tank', 'septic_tank_spec',
            'has_order_trap', 'order_trap_spec',
            'has_grase_trap', 'grase_trap_spec',
            'has_water_tank', 'water_tank_spec',
            'has_water_pump', 'water_pump_spec',
            'has_pipe_termites', 'pipe_termites_spec',

            // หลังคา Roofing
            'has_solar_roof', 'solar_roof_spec',
            'has_insulation', 'insulation_spec',
            'has_roof_ventilator', 'roof_ventilator_spec',

            // ไฟฟ้า Electrical
            'has_electric_meter', 'electric_meter_spec',
            'has_main_breaker', 'main_breaker_spec',
            'has_rcd', 'rcd_spec',
            'has_ev_charger', 'ev_charger_spec',
            'has_emergency_light', 'emergency_light_spec',
            'has_door_automatic', 'door_automatic_spec',
            'has_smoke_detector', 'smoke_detector_spec',
            'has_rcd_1st', 'rcd_1st_spec',
            'has_rcd_2nd', 'rcd_2nd_spec',
            'has_heat_detector', 'heat_detector_spec',

            // สมาร์ทโฮม & ความปลอดภัย
            'has_smart_home', 'smart_home_spec',
            'has_security_home_system', 'security_home_system_spec',
            'has_cctv_camera', 'cctv_camera_spec',
            'has_door_bell', 'door_bell_spec',
            'has_plug_switch', 'plug_switch_spec',
            'has_garage_door', 'garage_door_spec',
        ]);
    });
}

};
