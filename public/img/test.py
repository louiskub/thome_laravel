from PIL import Image
import os
import io


def resize_image():
    folder_path = '.'
    max_width = 800
    max_file_size = 500 * 1024  # 500 KB
    max_quality = 90
    min_quality = 70

    for root, dirs, files in os.walk(folder_path):
        if root != '.\\staff':
            continue
        for filename in files:
            print(root, filename, sep="\\")
            if not filename.lower().endswith(('.png', '.jpg', '.jpeg')):
                continue

            file_path = os.path.join(root, filename)
            image = Image.open(file_path)
            if image.width <= max_width:
                continue

            scale_factor = max_width / image.width
            new_width = int(image.width * scale_factor)
            new_height = int(image.height * scale_factor)
            new_image = image.resize((new_width, new_height))

            try:
                new_image.save(file_path)
            except Exception as e:
                new_image = new_image.convert("RGB")
                new_image.save(file_path)

            quality = max_quality
            while os.path.getsize(file_path) > max_file_size and quality > min_quality:
                try:
                    new_image.save(file_path, quality=quality)
                except Exception as e:
                    new_image = new_image.convert("RGB")
                    new_image.save(file_path, quality=quality)
                quality -= 5




def reduce_quality():
    target_directory = '.\\staff'
    folder_path = '.\\staff'
    max_quality = 90
    min_quality = 70

    for root, dirs, files in os.walk(folder_path):
        # if root == target_directory:
        #     continue
        # if not os.path.exists(target_directory):
        #     os.makedirs(target_directory)

        for filename in files:
            print(root, filename, sep="\\")
            if not filename.lower().endswith(('.png', '.jpg', '.jpeg')):
                continue
            file_path = os.path.join(root, filename)
            quality = max_quality
            # if os.path.getsize(file_path) <= 500 * 1024:
            #     continue
            while os.path.getsize(file_path) > 500 * 1024 and quality > min_quality:
                new_image = Image.open(file_path)
                save_path = os.path.join(target_directory, root)
                try:
                    new_image.save(os.path.join(save_path, filename), quality=quality)
                except Exception as e:
                    new_image = new_image.convert("RGB")
                    new_image.save(os.path.join(save_path, filename), quality=quality)
                quality -= 5

resize_image()
