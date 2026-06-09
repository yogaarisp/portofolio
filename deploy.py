import os
import zipfile
import subprocess

def create_zip():
    print("🚀 Menjalankan 'npm run build'...")
    subprocess.run(["npm", "run", "build"], shell=True)

    zip_name = 'deploy_aapanel.zip'
    
    if os.path.exists(zip_name):
        os.remove(zip_name)
        
    print(f"\n📦 Sedang membuat {zip_name} (mengecualikan vendor, node_modules, dll)...")
    
    # Folder dan file yang tidak perlu ikut di-upload
    excludes_dirs = {'node_modules', 'vendor', '.git', 'tests'}
    excludes_files = {zip_name, '.env', '.env.example', '.phpunit.result.cache', 'hot'}
    
    with zipfile.ZipFile(zip_name, 'w', zipfile.ZIP_DEFLATED) as zipf:
        for root, dirs, files in os.walk('.'):
            # Abaikan folder yang ada di excludes_dirs
            dirs[:] = [d for d in dirs if d not in excludes_dirs]
            
            for file in files:
                if file in excludes_files:
                    continue
                
                file_path = os.path.join(root, file)
                # Tambahkan file ke zip dengan path relatif
                zipf.write(file_path, os.path.relpath(file_path, '.'))
                
    print(f"\n✅ Selesai! File '{zip_name}' sudah siap.")
    print("👉 Silakan upload file ini ke File Manager aaPanel Anda.")

if __name__ == '__main__':
    create_zip()
