<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil | Gestion LMD</title>
    <!-- Import TailwindCSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <!-- Header -->
    <header class="bg-blue-600 text-white py-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">Gestion LMD</h1>
            <nav>
                <ul class="flex space-x-4">
                    <li><a href="#about" class="hover:none">À propos</a></li>
                    <li><a href="#services" class="hover:none">Nos Services</a></li>
                   
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-cover bg-center h-96" style="background-image: url(img.jpeg);">
        <div class="bg-black bg-opacity-50 h-full flex items-center justify-center">
            <div class="text-center text-white">
                <h2 class="text-4xl font-bold mb-4">Bienvenue sur notre plateforme de gestion LMD</h2>
                <p class="text-lg mb-6">Simplifiez la gestion des Unités d’Enseignement, Éléments Constitutifs, Étudiants et Notes.</p>
                <a href="#services" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded-lg">Explorez nos services</a>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-16 bg-white">
        <div class="container mx-auto">
            <h3 class="text-3xl font-bold text-center mb-12">Nos Services</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- UEs -->
                <a href="{{ route('unites_enseignement.index') }}" class="group bg-blue-100 hover:bg-blue-200 text-blue-700 rounded-lg shadow-lg p-6 text-center">
                    <img src="https://i.etsystatic.com/13048814/r/il/0b1ab1/3072162090/il_fullxfull.3072162090_2woe.jpg" alt="UEs" class="mx-auto mb-4">
                    <h4 class="text-xl font-bold mb-2">Unités d'Enseignement</h4>
                    <p class="text-sm">Gérez toutes vos unités d’enseignement avec simplicité.</p>
                </a>
                <!-- ECs -->
                <a href="{{ route('elements_constitutifs.index') }}" class="group bg-green-100 hover:bg-green-200 text-green-700 rounded-lg shadow-lg p-6 text-center">
                    <img src="https://img.elo7.com.br/product/zoom/3ACCEFC/quadro-decorativo-esportes-downhill-com-moldura-rc133-bicicleta.jpg" alt="ECs" class="mx-auto mb-4">
                    <h4 class="text-xl font-bold mb-2">Éléments Constitutifs</h4>
                    <p class="text-sm">Ajoutez et modifiez vos éléments constitutifs facilement.</p>
                </a>
                <!-- Étudiants -->
                <a href="{{ route('students.index') }}" class="group bg-yellow-100 hover:bg-yellow-200 text-yellow-700 rounded-lg shadow-lg p-6 text-center">
                    <img src="https://img.elo7.com.br/product/zoom/3ACCEFC/quadro-decorativo-esportes-downhill-com-moldura-rc133-bicicleta.jpg" alt="Étudiants" class="mx-auto mb-4">
                    <h4 class="text-xl font-bold mb-2">Étudiants</h4>
                    <p class="text-sm">Gérez les informations et profils des étudiants.</p>
                </a>
                <!-- Notes -->
                <a href="{{ url('/notes') }}" class="group bg-red-100 hover:bg-red-200 text-red-700 rounded-lg shadow-lg p-6 text-center">
                    <img src="https://img.elo7.com.br/product/zoom/3ACCEFC/quadro-decorativo-esportes-downhill-com-moldura-rc133-bicicleta.jpg" alt="Notes" class="mx-auto mb-4">
                    <h4 class="text-xl font-bold mb-2">Notes</h4>
                    <p class="text-sm">Simplifiez l’attribution et gestion des notes.</p>
                </a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-16 bg-gray-100">
        <div class="container mx-auto text-center">
            <h3 class="text-3xl font-bold mb-6">À propos de notre plateforme</h3>
            <p class="text-lg leading-relaxed">Notre plateforme de gestion LMD est conçue pour répondre aux besoins des établissements universitaires. Grâce à une interface intuitive et des outils puissants, vous pouvez gérer vos Unités d’Enseignement, Éléments Constitutifs, Étudiants et Notes de manière efficace et rapide.</p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-blue-600 text-white py-4">
        <div class="container mx-auto text-center">
            <p>&copy; {{ date('Y') }} Gestion LMD. Tous droits réservés.</p>
        </div>
    </footer>
</body>
</html>
