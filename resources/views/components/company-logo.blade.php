@props(['name' => 'ACME S.A.'])
<div>
    <svg
  {{ $attributes }}
  viewBox="0 0 256 256"
  xmlns="http://www.w3.org/2000/svg"
>
  <rect width="256" height="256" rx="32" fill="#E5E7EB"/>

  <text
    x="128"
    y="120"
    text-anchor="middle"
    dominant-baseline="middle"
    font-size="36"
    font-weight="600"
    fill="#374151"
  >
    {{ $name }}
  </text>
</svg>

    <!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
</div>

