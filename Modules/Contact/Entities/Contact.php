<?php

namespace Modules\Contact\Entities;

use App\Models\Company\Company;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Modules\Contact\Entities\Bank\BankAccount;
use Modules\Contact\Entities\Localization\Country;
use Modules\Invoicing\Entities\Customer\Invoice;
use Modules\Invoicing\Entities\Vendor\Bill;
use Modules\Purchase\Entities\Purchase;
use Modules\Sales\Entities\Sale;

class Contact extends Model
{
    use HasFactory, SoftDeletes, Searchable;

    protected $guarded = [];

    /* --- Searchable field --- */

    protected $searchable = [
        'name',
        'email',
        'phone',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'tags' => 'array',
    ];

    // public static function boot() {
    //     parent::boot();

    //     static::created(function ($model) {
    //         // $model->generateAvatar();
    //     });
    // }

    // Use Default Avatar
    public function avatar(){
        return $this->id.'_avatar';
    }

    // Generate User Avatar
    public function generateAvatar()
    {
        // Define the avatar directory and ensure it exists
        $avatarDir = 'storage/avatars';
        $publicAvatarDir = public_path($avatarDir);

        if (!file_exists($publicAvatarDir)) {
            mkdir($publicAvatarDir, 0777, true); // Create the directory with the correct permissions
        }

        // Use the first and second parts of the name for initials
        $nameParts = explode(' ', trim($this->name));

        // Get the first letter of the first word in the name
        $firstInitial = strtoupper(substr($nameParts[0], 0, 1));

        // If there's a second part, use its first letter; otherwise, use the first letter again
        $secondInitial = isset($nameParts[1]) ? strtoupper(substr($nameParts[1], 0, 1)) : $firstInitial;

        // Combine initials
        $initials = $firstInitial . $secondInitial;

        // Generate background color based on the name
        $bgColor = '#' . substr(md5($this->name), 0, 6);
        $textColor = '#ffffff'; // White text color

        // Create the image
        $image = imagecreate(200, 200);
        $bg = imagecolorallocate($image, hexdec(substr($bgColor, 1, 2)), hexdec(substr($bgColor, 3, 2)), hexdec(substr($bgColor, 5, 2)));
        $text = imagecolorallocate($image, hexdec(substr($textColor, 1, 2)), hexdec(substr($textColor, 3, 2)), hexdec(substr($textColor, 5, 2)));
        imagefill($image, 0, 0, $bg);

        // Path to font file
        $fontPath = public_path('assets/fonts/arial/ARIAL.ttf');
        if (!file_exists($fontPath)) {
            die('Font file does not exist: ' . $fontPath);
        }

        $fontSize = 75;
        $angle = 0;
        $x = 50; // Adjust the X coordinate
        $y = 150; // Adjust the Y coordinate

        // Add initials to the image
        imagettftext($image, $fontSize, $angle, $x, $y, $text, $fontPath, $initials);

        // Save the image to a file
        // $avatarFilename = $this->id . '_avatar.png';
        // imagepng($image, public_path($avatarPath));
        // imagedestroy($image);
        $avatarFilename = $this->id . '_avatar.png';
        $avatarPath = $avatarDir . '/' . $avatarFilename;

        // Generate the image in memory
        ob_start(); // Start output buffering
        imagepng($image); // Output the image to the buffer
        $imageData = ob_get_clean(); // Get the image data from the buffer

        // Save the image to the storage (in 'public/avatars' directory)
        Storage::disk('public')->put('avatars/' . $avatarFilename, $imageData);

        imagedestroy($image); // Destroy the image resource to free up memory
        // Update the user record with the avatar path
        $this->avatar = $avatarFilename;
        $this->save();

        // Provide feedback
        echo "Avatar created successfully: " . $avatarPath;
    }

    // If the contacts belong to the company
    public function scopeIsCompany(Builder $query, $company_id)
    {
        return $query->where('company_id', $company_id);
    }

    // If the contacts belong to the company
    public function scopeIsType(Builder $query, $type)
    {
        return $query->where('type', $type);
    }

    // If the contacts belong to the company
    public function scopeIsSupplier(Builder $query)
    {
        return $query->where('is_supplier', true);
    }

    // If the contacts belong to the company
    public function scopeIsCustomer(Builder $query)
    {
        return $query->where('is_customer', true);
    }

    // Get Company
    public function company() {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    // Get Country
    public function country() {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    // Get Contact Adress
    public function contactAddresses() {
        return $this->hasMany(ContactAddress::class, 'contact_id', 'id');
    }

    // Get Bank Accounts
    public function bankAccounts() {
        return $this->hasMany(BankAccount::class, 'contact_id', 'id');
    }

    // Get Sales
    public function sales() {
        return $this->hasMany(Sale::class, 'customer_id', 'id');
    }

    // Get Purchase
    public function purchases() {
        return $this->hasMany(Purchase::class, 'supplier_id', 'id');
    }

    // Get Invoices
    public function invoices() {
        return $this->hasMany(Invoice::class, 'customer_id', 'id');
    }

    // Get Bills
    public function bills() {
        return $this->hasMany(Bill::class, 'supplier_id', 'id');
    }


    // protected static function newFactory()
    // {
    //     return \Modules\Contact\Database\factories\ContactFactory::new();
    // }
}
