<section class="nps-footer">
    @if (config('nps.socials.whatsapp') || config('nps.socials.facebook') || config('nps.socials.instagram') || config('nps.socials.linkedin') || config('nps.socials.youtube'))
    <div class="container h-100">
        <div class="row align-items-end h-100 pb-3">
        <div>
            <div class="col-12 text-center">
            <img src="{{asset(config('nps.path') . '/footer.png')}}" alt="" class="img-footer"/>
            </div>
            <div class="col-12 pt-2 text-center">
            @if (config('nps.socials.whatsapp'))
            <a href="{{config('nps.socials.whatsapp')}}" class="link-social">
                <i class="fab fa-whatsapp"></i>
            </a>
            @endif
            @if (config('nps.socials.facebook'))
            <a href="{{config('nps.socials.facebook')}}" class="link-social">
                <i class="fab fa-facebook-f"></i>
            </a>
            @endif
            @if (config('nps.socials.instagram'))
            <a href="{{config('nps.socials.instagram')}}" class="link-social">
                <i class="fab fa-instagram"></i>
            </a>
            @endif
            @if (config('nps.socials.linkedin'))
            <a href="{{config('nps.socials.linkedin')}}" class="link-social">
                <i class="fab fa-linkedin-in"></i>
            </a>
            @endif
            @if (config('nps.socials.youtube'))
            <a href="{{config('nps.socials.youtube')}}" class="link-social">
                <i class="fab fa-youtube"></i>
            </a>
            @endif
            </div>
        </div>
        </div>
    </div>
    @endif
</section>
