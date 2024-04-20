<div class="mb-5">
</div>
<footer class="py-5" style="box-shadow: 0 -4px 20px -2px rgba(0, 0, 0, 0.1);">
    <div class="container">
        <div class="row">
        <div class="col-6 col-md-2 mb-3">
            <h5><strong>Campaigns</strong></h5>
            <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Browse</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Create</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Become a publisher</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Become a donor</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"></a></li>
            </ul>
        </div>

        <div class="col-6 col-md-2 mb-3">
        <h5><strong>About IhsanNET</strong></h5>
            <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About Us</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Blog</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQ</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Contact us</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"></a></li>
            </ul>
        </div>

        <div class="col-6 col-md-2 mb-3">

        </div>

        <div class="col-md-5 offset-md-1 mb-3">
            <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                <a class="navbar-brand" href="{{ route('campaigns.index') }}">
                    <img src="{{ asset('storage/images/LOGO.png') }}" width="185" height="50" class="d-inline-block align-top" alt="IhsanNET">
                </a>
            </div>
            <div class="mb-5">
            </div>
            <form>
            <h5><strong>Subscribe to our newsletter</strong></h5>
            <p>Monthly digest of what's new and exciting from us.</p>
            <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                <label for="newsletter1" class="visually-hidden">Email address</label>
                <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                <button class="btn btn-primary" type="button">Subscribe</button>
            </div>
            </form>
        </div>
        </div>

        <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
        <p>&copy; 2023 IhsanNET, Inc. All rights reserved.</p>
        <ul class="list-unstyled d-flex">
            <li class="ms-3"><a class="link-dark" href="#"><i class="bi bi-instagram" style="font-size: 1.4rem;"></i></a></li>
            <li class="ms-3"><a class="link-dark" href="#"><i class="bi bi-twitter" style="font-size: 1.4rem;"></i></a></li>
            <li class="ms-3"><a class="link-dark" href="#"><i class="bi bi-facebook" style="font-size: 1.4rem;"></i></a></li>
        </ul>
        </div>
    </div>
</footer>
