<div class="row">
    <div class="col-md-10">
        <h6 class="text-uppercase text-secondary">Privacy</h6>
        <hr>
        <div class="alert border-0 border-start border-5 border-primary alert-dismissible fade show pt-2 pb-4 ">
            <div class="d-flex align-items-center">
                <div class="font-35 text-primary"><i class="bx bx-info-circle"></i>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0 text-primary">Private Account</h6>
                </div>
            </div>
            <p>
                You can control whether anyone can view your account or contents like images and videos by toggling
                private account. By enabling this setting, you made your account into a private accounts.
            </p>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" wire:model="agreement" id="confirm-remove">
                <label class="form-check-label" for="confirm-remove">Make my account private</label>
            </div>
        </div>

        <h6 class="text-uppercase text-secondary">Social Media</h6>
        <hr>
        <div class="card">
            <div class="card-body p-4">
                <form>
                    <div class="form-group">
                        <label for="fullname">Facebook</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="lni lni-facebook-original me-2"></i>
                                    <span class="text-muted">https://facebook.com/</span>
                                </div>
                            </div>
                            <input type="text" class="form-control" name="fullname" id="fullname" wire:model="fullname">
                        </div>
                        @error('fullname')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="fullname">Instagram</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="lni lni-instagram-filled me-2"></i>
                                    <span class="text-muted">https://instagram.com/</span>
                                </div>
                            </div>
                            <input type="text" class="form-control" name="fullname" id="fullname" wire:model="fullname">
                        </div>
                        @error('fullname')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="fullname">Facebook</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="lni lni-linkedin-original me-2"></i>
                                    <span class="text-muted">https://linkedin.com/in/</span>
                                </div>
                            </div>
                            <input type="text" class="form-control" name="fullname" id="fullname" wire:model="fullname">
                        </div>
                        @error('fullname')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="fullname">TikTok</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <svg class="me-2" width="1rem" height="1rem" viewBox="0 0 377 377" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0)">
                                            <path
                                                d="M155.809 377C149.671 377 143.534 377 137.396 377C136.835 376.77 136.295 376.429 135.714 376.339C133.742 376.049 131.729 375.969 129.767 375.598C124.63 374.647 119.494 373.726 114.408 372.545C110.884 371.734 107.349 370.792 104.015 369.421C97.9279 366.918 91.9206 364.264 86.1535 361C77.6131 356.175 69.6734 350.548 62.6649 343.759C57.4285 338.693 52.5125 333.217 47.997 327.5C44.4527 323.014 41.459 318.038 38.7357 313.002C35.7521 307.485 33.0888 301.758 30.786 295.931C29.0639 291.586 28.0026 286.96 26.9013 282.405C25.7899 277.789 24.5884 273.143 24.1579 268.438C23.5271 261.509 23.5572 254.521 23.3169 247.552C23.2868 246.761 23.3169 245.95 23.427 245.169C24.0878 240.493 24.7286 235.828 25.4595 231.162C25.91 228.319 26.3005 225.435 27.0915 222.682C28.333 218.366 29.6546 214.051 31.3867 209.916C33.8597 204.029 36.543 198.212 39.5166 192.565C43.2212 185.526 47.8969 179.079 53.1633 173.121C59.6712 165.752 66.6798 158.844 74.8598 153.317C79.6556 150.073 84.6217 147.049 89.7079 144.296C94.1934 141.863 98.8791 139.761 103.625 137.858C107.47 136.316 111.494 135.175 115.499 134.084C118.213 133.343 121.016 132.922 123.799 132.452C128.095 131.721 132.38 130.86 136.715 130.469C140.55 130.119 144.435 130.339 148.309 130.319C148.74 130.319 149.2 130.289 149.581 130.439C155.358 132.672 157.811 136.306 157.861 141.923C158.031 161.127 157.941 180.33 157.891 199.543C157.891 201.145 157.681 202.908 157 204.329C154.887 208.785 151.413 211.198 146.257 211.408C142.482 211.558 138.628 212.009 135.003 213.01C129.917 214.422 125.151 216.785 121.016 220.179C117.041 223.443 113.477 227.067 110.824 231.553C108.391 235.658 106.338 239.903 105.637 244.659C105.127 248.133 104.306 251.657 104.526 255.101C104.806 259.427 105.467 263.762 107.079 267.947C108.831 272.502 111.054 276.768 114.178 280.412C119.194 286.249 125.221 290.705 132.69 293.238C137.736 294.95 142.823 295.781 148.079 295.871C149.271 295.891 150.482 295.561 151.663 295.3C155.168 294.529 158.802 294.109 162.116 292.837C168.945 290.224 174.712 285.919 179.327 280.232C185.765 272.312 188.939 263.171 188.939 252.949C188.939 172.751 188.939 92.5529 188.969 12.3551C188.969 10.7031 189.239 9.00098 189.68 7.40904C190.611 3.98486 193.034 1.91233 196.278 0.700855C196.578 0.590721 196.789 0.240293 197.049 0C218.645 0 240.252 0 261.848 0C262.118 0.240293 262.359 0.620757 262.679 0.690843C266.043 1.52186 269.587 5.43663 269.918 8.90086C270.238 12.2349 270.308 15.599 270.689 18.9331C271.079 22.2872 271.43 25.6913 272.331 28.9153C273.462 32.9502 274.944 36.915 276.626 40.7497C279.179 46.5668 282.553 51.9133 286.698 56.7793C290.513 61.2547 294.608 65.4699 299.444 68.804C303.198 71.3971 307.133 73.8401 311.248 75.7725C315.323 77.6948 319.689 79.0865 324.034 80.348C327.478 81.3493 331.062 81.92 334.617 82.4306C337.51 82.8511 340.454 82.8511 343.377 83.1214C349.765 83.7021 352.999 89.0186 353.029 94.0448C353.169 113.619 353.109 133.193 353.049 152.766C353.049 154.248 352.789 155.86 352.158 157.172C350.005 161.667 346.361 164.22 341.305 164.14C336.239 164.06 331.173 163.71 326.106 163.379C323.924 163.239 321.751 162.939 319.598 162.558C316.224 161.958 312.87 161.237 309.516 160.536C306.993 160.015 304.43 159.635 301.967 158.894C297.722 157.612 293.467 156.291 289.341 154.639C283.344 152.246 277.457 149.542 271.52 146.979C271.079 146.789 270.619 146.659 269.968 146.439C269.968 147.53 269.968 148.321 269.968 149.112C269.968 183.594 269.948 218.076 269.988 252.568C269.998 260.628 269.627 268.638 267.785 276.517C266.724 281.063 266.053 285.729 264.601 290.144C262.819 295.561 260.546 300.827 258.223 306.033C252.797 318.218 245.328 329.092 235.956 338.543C230.84 343.709 225.434 348.715 219.596 353.041C213.829 357.316 207.502 360.89 201.164 364.304C196.678 366.717 191.832 368.53 187.017 370.272C183.342 371.603 179.497 372.494 175.683 373.376C171.948 374.247 168.164 374.937 164.379 375.558C161.866 375.969 159.303 376.099 156.78 376.399C156.449 376.439 156.139 376.79 155.809 377Z"
                                                fill="#212529" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0">
                                                <rect width="376.55" height="376.55" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    <span class="text-muted">https://tiktok.com/</span>
                                </div>
                            </div>
                            <input type="text" class="form-control" name="fullname" id="fullname" wire:model="fullname">
                        </div>
                        @error('fullname')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="text-end">
                        <button class="btn btn-dark">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
