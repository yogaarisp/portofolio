import re

file_path = r'c:\laragon\www\portofolio\resources\views\welcome.blade.php'
with open(file_path, 'r', encoding='utf-8') as f:
    c = f.read()

# Replace __('Text') with '{{ __('Text') }}' ONLY if it's not already inside a PHP tag or Blade brace
# Actually, inside the blade template right now, I have lines like:
# @click="openExp(__('Freelancer'), ...
# I will just replace all instances of: __('SomeText') -> '{{ __('SomeText') }}'
# BUT wait! Line 59 has `@foreach(['8+'=>__('Years Experience'), ...`
# If I replace that, it will break line 59 again!
# So let's only replace `__('Text')` if it is inside `@click="openExp(...)` or `['...']`?
# In python I can just look for `__('` and check context, or just replace specific lines.
# Actually, I can just find `@click="openExp(` and fix those lines explicitly.

def fix_click(match):
    # match.group(0) is the entire @click="..."
    content = match.group(0)
    # inside this content, we want to replace __('...') with '{{ __('...') }}'
    content = re.sub(r"__\('([^']+)'\)", r"'{{ __('\1') }}'", content)
    return content

c = re.sub(r'@click="openExp\([^)]+\)?"', fix_click, c, flags=re.DOTALL)

# Let's also check other places. I see `<h3 ...>Pekerja Lepas</h3>` on line 191 wasn't translated in my python script!
# Oh, my python script replaced EXACT strings. "Pekerja Lepas" wasn't translated in HTML because I only had "'Pekerja Lepas'" (with quotes) in my replacements!
# Let's fix that.
replacements = {
    "Pekerja Lepas": "{{ __('Freelancer') }}",
    "Konsultan Independen": "{{ __('Independent Consultant') }}",
    "Staf IT": "{{ __('IT Staff') }}",
    "Koordinator Helpdesk IT": "{{ __('IT Helpdesk Coordinator') }}",
    "Dukungan IT": "{{ __('IT Support') }}"
}
for k, v in replacements.items():
    # Only replace if not already replaced
    c = c.replace(k, v)

with open(file_path, 'w', encoding='utf-8') as f:
    f.write(c)

print("Fixed!")
