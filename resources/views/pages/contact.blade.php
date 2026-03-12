@php
    $profile = \App\Models\CompanyProfile::first();
@endphp
<x-app-layout>
    <!-- ========== HERO / BREADCRUMB ========== -->
    <section class="pt-32 pb-16 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="section-label">Get In Touch</div>
            <h1 class="section-title mt-4">Contact <span class="highlight">Us</span></h1>
            <p class="text-slate-500 mt-3 max-w-xl">Have questions about our parts or need a bulk order quote? Our experts are here to help.</p>
        </div>
    </section>

    <!-- ========== CONTACT CONTENT ========== -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                <!-- Info Cards -->
                <div class="space-y-5">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div class="metallic-card p-6 space-y-4 bg-white !rounded-xl">
                            <div class="w-11 h-11 rounded-xl bg-blue-50 flex items-center justify-center">
                                <i class="fas fa-phone text-blue-600"></i>
                            </div>
                            <h3 class="text-lg font-bold text-slate-900">Call Us</h3>
                            <p class="text-slate-500 text-sm italic">Direct line to our sales team.</p>
                            <a href="tel:{{ $profile->contact ?? '+918128912711' }}" class="block text-blue-600 font-bold text-sm hover:translate-x-1 transition-transform">{{ $profile->contact ?? '+91 8128912711' }}</a>
                        </div>
                        <div class="metallic-card p-6 space-y-4 bg-white !rounded-xl">
                            <div class="w-11 h-11 rounded-xl bg-blue-50 flex items-center justify-center">
                                <i class="fas fa-envelope text-blue-600"></i>
                            </div>
                            <h3 class="text-lg font-bold text-slate-900">Email Us</h3>
                            <p class="text-slate-500 text-sm italic">Expect a reply in 24 hours.</p>
                            <a href="mailto:{{ $profile->email ?? 'info@stechqualityparts.com' }}" class="block text-blue-600 font-bold text-sm hover:translate-x-1 transition-transform">{{ $profile->email ?? 'info@stechqualityparts.com' }}</a>
                        </div>
                    </div>

                    <div class="metallic-card p-6 space-y-4 bg-white !rounded-xl">
                        <div class="flex items-center gap-4">
                            <div class="w-11 h-11 rounded-xl bg-blue-50 flex items-center justify-center shrink-0">
                                <i class="fas fa-map-marker-alt text-blue-600"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-slate-900">Our Location</h3>
                                <p class="text-slate-500 text-sm">{{ $profile->location ?? $profile->city ?? 'Gujarat, India' }}</p>
                            </div>
                        </div>
                        <div class="h-48 rounded-xl overflow-hidden border border-slate-100 mt-4">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3671.6979219662!2d72.45199657519194!3d23.034870579165!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e9b89668407cd%3A0x6a0c541575ca8f24!2sAhmedabad%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>

                <!-- Form -->
                <div class="reveal metallic-card p-8 lg:p-10 !rounded-2xl bg-white shadow-2xl shadow-blue-500/5">
                    <form action="{{ route('inquiries.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Full Name</label>
                                <input type="text" name="name" placeholder="John Doe" required class="form-input">
                            </div>
                            <div class="space-y-2">
                                <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Email</label>
                                <input type="email" name="email" placeholder="john@example.com" required class="form-input">
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Phone</label>
                            <input type="tel" name="phone" placeholder="+91 00000 00000" class="form-input">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Subject</label>
                            <select name="subject" class="form-input cursor-pointer appearance-none bg-no-repeat bg-[right_1.25rem_center] bg-[length:1em_1em]" style="background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23cbd5e1%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E');">
                                <option>Product Inquiry</option>
                                <option>Bulk Order Quote</option>
                                <option>Custom Modification</option>
                                <option>Dealer Program</option>
                                <option>Other</option>
                            </select>
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Message</label>
                            <textarea name="message" rows="4" placeholder="Tell us what you're looking for..." required class="form-input resize-none"></textarea>
                        </div>
                        <button type="submit" class="btn-primary w-full justify-center py-4 uppercase tracking-widest text-sm shadow-xl shadow-blue-500/20">
                            Send Inquiry <i class="fas fa-paper-plane ml-2 text-xs"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
