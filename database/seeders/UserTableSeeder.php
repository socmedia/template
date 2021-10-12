<?php

namespace Database\Seeders;

use App\Models\User;
use App\Utillities\Generate;
use Illuminate\Database\Seeder;
use Modules\User\Models\Entities\UsersSetting;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dev = User::create([
            'id' => Generate::ID(32),
            'name' => 'Developer',
            'email' => 'developer@app.com',
            'password' => bcrypt('password'),
            'avatar_url' => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAC6ElEQVR4nO2azUoyURyHH995w+SQH5Fi3w0RWNQuaJH3EK4iohZdQauuoRuIdkEbV1H3EO1K2kS0lAohJUyxxgqxhSDxqmPkdP4vdJ7VGeZ4/j8e53yM6CuVSnV+MX+kA0hjBEgHkMYIkA4gjREgHUAaI0A6gDRGgHQAaYwA6QDSGAHSAaQxAqQDSGMESAeQxgiQDiDN3+9+MJ/Ps7u72/aeZVkopQiFQti2TSKRIJFI9DRmO1ZXV1laWvpy/3Z8W4AbtVqNcrlMuVzm7u6O09NTRkZGSKVSTE9P/0TJb+OJgK2tLWzbbl6/vr5SqVS4vb3l+vqam5sbcrkc+/v7pFIplpeXu465vr7O5OSka5+BgYGes3siIBAIoJRqXiulGBwcZGJigmQyyf39PYeHhzw+PnJ8fEwoFGJ+ft51zHA4zNDQkBfxXNGyCI6NjbG9vU04HKZer5NOp6lWqzpKd0XbLqCUYm1tDYBqtcrZ2Zmu0q5o3QZnZmYYHR0FIJPJ6CzdEe3ngLm5OQAeHh6oVCq6y7egXcD4+Hiznc/ndZdv4UfOAW583i1eXl469tvb23MdJx6Ps7Oz03Me7U+A3+9vtt/e3nSXb0H7E+A4TrMdCAQ69tvY2GBqaqrjfcuyPMmjXUCpVGq2P0+HfwkGg0QikR/Po30KZLNZoPENDg8P6y7fglYBtVqNq6sroLEb9PX16SzfFq0Czs/PeXp6Auj5NdYrtAnI5XKcnJwAEIlEWFxc1FXaFS2L4MXFBUdHR7y/v2NZFpubm56t4r3iiQDHcXh+fgYa89xxHIrFItlslsvLSwqFAtA4A3zlPR+gWCx2PSkGg0H6+/t7yu6JgIODg659ZmdnWVlZIRaLfWnMdDrdtc9/+ZOYz+fD7/ejlCIajWLbNgsLC8Tjca9LeYLP/FX2l2MESAeQxgiQDiCNESAdQBojQDqANEaAdABpjADpANIYAdIBpDECpANIYwRIB5Dm1wv4AD3ItuqJBwH+AAAAAElFTkSuQmCC',
            'email_verified_at' => now()->toDateTimeString(),
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString(),
        ]);

        $dev->assignRole('Developer');
        UsersSetting::create([
            'user_id' => $dev->id,
        ]);

        $admin = User::create([
            'id' => Generate::ID(32),
            'name' => 'Admin',
            'email' => 'admin@app.com',
            'password' => bcrypt('password'),
            'avatar_url' => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAEZElEQVR4nO2ay0s6XxiHHzO7MN3sfi8JyYJumLWoRf9BRKsIWrRoHe1atW3dpl3LlrVq2SZaaCpGVAYRSIJhQWWZmqb+FjFDUb/Scb6cRfOAMDln3vPxcc7rGcgQiUSy/GGKRAcQjS5AdADR6AJEBxCNLkB0ANHoAkQHEI0uQHQA0egCRAcQjS5AdADR6AJEBxCNLkB0ANHoAkQHEE2xlsVeX19ZW1sjmUwyOzvLxMTEr9fc3t6yvr7+7Tmj0YgkSVRXV2OxWLDZbNhsNi0jayvA5/ORTCYBODo6yknAT6TTaZ6ennh6eiIYDHJwcEBrayszMzP09PRoEVlbAU6nEwCTyUQwGCQUCtHa2prz9YuLi1gsFuXv19dXotEo19fXnJ+fc3FxQSgUYnNzk5mZmYIFg4Y94ObmhuvrayoqKhgbGwPA5XLlVaO8vBxJkpRXbW0tnZ2dTE5OsrS0xMrKCnV1dWQyGXZ2djg9PS04t2YC5G/fZrMxODgIgNfr5e3tTaspaG9vZ3l5mZqaGrLZLNvb2yQSiYJqaiLg7e0Nr9cLwPDwMFarlaqqKmKxGCcnJ1pMoSBJEnNzcwAkEgkODw8LqqeJgJOTE2KxGJWVlUqXttvtwHsz1Bqr1UpbWxuAIl4tmgiQb3+73U5R0XtJuQ9cXl5yf3+vxTSf6O/vByAcDhONRlXXKVjA/f09V1dXAIyPjyvvNzU10dnZSTabzbsZ5kJHR4dyfHt7q7pOwQKcTifZbJauri6ampo+nXM4HMC/WQaSJCnHsVhMdZ2CBGQyGdxuN/D525ex2+0UFxcTiUTw+/2FTPWF0tJS5VjefKmhIAEXFxdEIhFMJhMjIyNfzpeVlTEwMADkvyf4jXg8rhyXl5errlPQTlBufqlUitXV1R/Hnp2dEY1GqaioKGRKhUgkohx/XA75ovoOeH5+5vz8POfx6XQaj8ejdrovBAIB4P2BqaWlRXUd1XeA2+0mk8lQX1/P4uLij2P39/fxer24XC6mpqbUTqmQTqeVbXBHRwcmk0l1LdUC5DXtcDhobm7+cezk5CRer5dwOEwgEKC7u1vttMC7/MfHR+D75psPqpbA1dUVd3d3GAwGRkdHfx3/8SdS7htqCYVC7O7uAmA2m3Oa/ydUCZA/RE9PD2azOadr5J3h8fGx6p8tj8fDxsYGqVQKo9HIwsICRqNRVS2ZvJdAIpFQHnDkD5ULdrudvb09kskkPp/v21s3Ho/z8vICvK/zeDzOw8MDgUAAn8/H3d0d8L4HmJ+fp6urK9/4X8hbgMfjIZVKUVJSojz25kJVVRW9vb34/X5cLte3Ara2tn6t09fXx/T0NI2NjXnl/j/yFiA3v6GhIUpKSvK6dnx8HL/fTyAQIBwOf9k6f8RgMFBaWookSTQ0NGCxWBgYGPi14eaLQf9X2T+OLkB0ANHoAkQHEI0uQHQA0egCRAcQjS5AdADR6AJEBxCNLkB0ANHoAkQHEI0uQHQA0fx5Af8BFo18g8AvyAIAAAAASUVORK5CYII=',
            'email_verified_at' => now()->toDateTimeString(),
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString(),
        ]);

        $admin->assignRole('Admin');
        UsersSetting::create([
            'user_id' => $admin->id,
        ]);

        $user = User::create([
            'id' => Generate::ID(32),
            'name' => 'User',
            'email' => 'user@app.com',
            'password' => bcrypt('password'),
            'avatar_url' => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAEC0lEQVR4nO2aOUsrXRyHH03ckiiJYCQgFlEiaRQEN0Rwhwja+BEszBcQbWysLP0Cgo2lhYVgDCqKxAUXcMGNoGgI0cKVScxifIuLuVe9r2+c5Hrm5c5THTLnP/9fHs7MnITJuL+/f+EvJlN0ANGoAkQHEI0qQHQA0agCRAcQjSpAdADRqAJEBxCNKkB0ANGoAkQHEI0qQHQA0agCRAcQjSpAdADRaOUWbm1tMTk5CcDo6CjZ2dlJ1Q0PDyNJEg6Hg46Ojt/OCQQCeDwevF4vNzc3RKNRsrOzMRqNWCwWbDYblZWV5OXlyY2fQLaAP4XL5cLtdhOPx998/vT0RCAQIBAIsLOzw+LiIkNDQyn3U5SA5eVlXC4XAEVFRTQ1NWGxWNDpdIRCIa6vr/F6vRweHlJVVZWWnooREI/HcbvdAFitVpxOJ1rt23hWq5X6+npisRjPz89p6asYAdfX10iSBEBLS8uHL/8rWq320+NfQTFPgUgkkhjrdLpv66sYASaTKTG+vLz8tr6KEZCfn09paSkAbrcbv9//LX0VIwCgp6eHzMxMJElibGyMmZkZHh4e/mhPRQmwWq309fVhMBiIxWLMz88zMjLC+Pg4+/v7H/YG6UAxT4FX7HY7g4ODLCwssL6+TjAY5ODggIODA4xGI21tbTQ2Nqatn+IEAOj1erq7u3E4HOzu7rKxscHJyQl3d3dMTU2xtbVFX18fer0+5V6KugTeo9Vqqa6uxul0MjAwQEVFBQDn5+dMTEykpYdsAZmZP0tfXpJ/y+Z1rkaj+VI/i8VCf38/DQ0NAHi9Xs7Ozr50jt8hW8Cvm5VQKJRUTTweT8yVu3y7urrIyMgAfqyEVJEtoLi4ODG+uLhIqsbn8yVWgNlsltVXr9eTk5MDvN09ykW2AKPRmJDg8XiSqllZWQF+rJ7XTc9XkSSJcDicyJAqKd0EW1tbATg5OWF2dvbTuR6Ph83NzUTd+3vA4+NjUr/wpqeneXl5QaPRYLfbZSb/SUqPwZqaGvb29tjf32dubo7j42Pq6+spKSlBp9MRDofx+/1sbm5ydHQEgM1mo7m5+cO5PB4PS0tL2O12bDYbZrMZg8GAVqslGAzi8/lYXV1NXG7t7e0UFBSkEh+AjFRflIzFYkxNTbG+vv6fc2tra+nt7SUrK+vDMZfLlfgz5DM0Gg0dHR10dnbKyvuelAW84vf7WVtbw+v1cnt7SyQSITc3F5PJRFlZGXV1dVgsln+tD4VCbG9vc3p6ytXVFff390SjUQByc3Mxm82Ul5dTV1dHYWFhOiIDaRTwf0XRO8HvQBUgOoBoVAGiA4hGFSA6gGhUAaIDiEYVIDqAaFQBogOIRhUgOoBoVAGiA4hGFSA6gGj+egH/AN7bVeITqChiAAAAAElFTkSuQmCC',
            'email_verified_at' => now()->toDateTimeString(),
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString(),
        ]);

        $user->assignRole('User');
        UsersSetting::create([
            'user_id' => $user->id,
        ]);

    }
}