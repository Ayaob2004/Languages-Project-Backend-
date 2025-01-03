<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        // Novels
        $novels = [
            [
                "stores" => [1],
                "name" => "Arsas",
                "author" => "Ahmed El Hamdan",
                "price" => "20.0",
                "image" => "/books_images/novels/Arese.jpg",
                "amount" => "50",
                "ratings" => "3.5",
                "type" => "novels",
                "details" => "Arsas is a literary work by the Egyptian author Ahmed Khaled Tawfik. It deals with various themes related to science fiction and fantasy."
            ],
            [
                "stores" => [2],
                "name" => "you are mine",
                "author" => "Mona Al Marshoud",
                "price" => "15.0",
                "image" => "/books_images/novels/youaremine.jpg",
                "amount" => "50",
                "ratings" => "3.9",
                "type" => "novels",
                "details" => "Enta Lee by Saudi author Mona Al Marshoud is a romantic novel that addresses themes of love, separation, and fate. The novel consists of two parts."
            ],
            [
                "stores" => [3],
                "name" => "Two neighbors rules",
                "author" => "Amr Abdel Hamid",
                "price" => "24.0",
                "image" => "/books_images/novels/Twoneighborsrules.jpg",
                "amount" => "50",
                "ratings" => "4.9",
                "type" => "novels",
                "details" => "The people of Garetin are divided into two classes: the Masala and the Nobles. In this state, there are strict rules that can lead to execution for anyone who dares to break the binding law there. These strange and strict rules were issued by the indigenous people of the state due to the widespread injustice and corruption at that time."
            ],
            [
                "stores" => [4],
                "name" => "Zikola land",
                "author" => "Amr Abdel Hamid",
                "price" => "25.0",
                "image" => "/books_images/novels/Zikolaland.jpg",
                "amount" => "50",
                "ratings" => "3.9",
                "type" => "novels",
                "details" => "A fictional novel describing a parallel world to ours. The protagonist, a young man from the village of Al-Baho Frik, finds himself one day in a land that does not use money like humans but instead uses units of intelligence. Every work equivalent to money in our world has a specific value of intelligence units there."
            ],
            [
                "stores" => [5],
                "name" => "Ikadoli",
                "author" => "Hanan Lashin",
                "price" => "20.0",
                "image" => "/books_images/novels/Ikadoli.jpg",
                "amount" => "50",
                "ratings" => "4.1",
                "type" => "novels",
                "details" => "Ikadoli by Saudi author Ghada Al-Samman is a novel that discusses themes of love, separation, and the search for identity. The novel is characterized by its deep literary style and complex characters."
            ],
            [
                "stores" => [6],
                "name" => "To reassure my heart",
                "author" => "Adham Sharqawi",
                "price" => "15.0",
                "image" => "/books_images/novels/Toreassuremyheart.jpg",
                "amount" => "50",
                "ratings" => "4.2",
                "type" => "novels",
                "details" => "To reassure my heart is a poignant exploration of love, loss, and the journey of self-discovery. The author delves into the complexities of human emotions and relationships, crafting a narrative that resonates with readers on a deep level. Through rich storytelling and relatable characters, the book invites readers to reflect on their own experiences with love and healing."
            ],
            [
                "stores" => [1,6],
                "name" => "The Secret Life of Saeed",
                "author" => "Mohammed Abdul-Hay",
                "price" => "18.99",
                "image" => "/books_images/novels/thesecretlifeofsaeed.jpg",
                "amount" => "50",
                "ratings" => "4.4",
                "type" => "novels",
                "details" => "This novel explores the complex psychological and social challenges of Saeed, a young man trying to find himself in a world full of contradictions. It delves into themes of existentialism and personal transformation in modern Arab society."
            ],
            [
                "stores" => [2,5],
                "name" => "Season of Migration to the North",
                "author" => "Tayeb Salih",
                "price" => "16.99",
                "image" => "/books_images/novels/Seasonsofmigrationtothenorth.jpg",
                "amount" => "50",
                "ratings" => "4.6",
                "type" => "novels",
                "details" => "A landmark novel in Arabic literature, this book tells the story of a Sudanese man returning from England to his homeland, only to be drawn into a complex narrative of identity, migration, and the impact of colonialism."
            ],
            [
                "stores" => [3,4],
                "name" => "To Kill a Mockingbird",
                "author" => "Harper Lee",
                "price" => "15.99",
                "image" => "/books_images/novels/Tokillamockinbird.jpg",
                "amount" => "50",
                "ratings" => "4.8",
                "type" => "novels",
                "details" => "A Pulitzer Prize-winning novel set in the 1930s South, following young Scout Finch as she learns about justice, prejudice, and the complexities of human nature through the trial of an innocent black man accused of rape."
            ],
            [
                "stores" => [4,3],
                "name" => "The Yacoubian Building",
                "author" => "Alaa Al Aswany",
                "price" => "14.99",
                "image" => "/books_images/novels/TheYacoubianBuilding.jpg",
                "amount" => "50",
                "ratings" => "4.5",
                "type" => "novels",
                "details" => "A critically acclaimed novel that explores the lives of several residents of a building in downtown Cairo, Egypt. The book delves into themes of corruption, social class, love, and the political landscape of modern Egypt."
            ],
            [
                "stores" => [5,2],
                "name" => "Frankenstein in Baghdad",
                "author" => "Ahmed Saadawi",
                "price" => "16.0",
                "image" => "/books_images/novels/frankenstein_in_baghdad.jpg",
                "amount" => "50",
                "ratings" => "4.1",
                "type" => "novels",
                "details" => "Set in war-torn Baghdad, this novel follows a junk dealer who creates a creature from body parts collected after bombings. The creature, dubbed 'the Monster,' seeks justice, highlighting the horrors of war and societal alienation."
            ],
            [
                "stores" => [6,1],
                "name" => "The Book Censor's Library",
                "author" => "Bothayna Al-Essa",
                "price" => "20.0",
                "image" => "/books_images/novels/The_Book_Censors_Library.jpg",
                "amount" => "50",
                "ratings" => "4.2",
                "type" => "novels",
                "details" => "In a dystopian future, a book censor secretly collects banned books and joins a resistance group. This satirical novel explores themes of censorship and the power of literature."
            ]
        ];
        foreach ($novels as $novelData) {
            $stores = $novelData['stores'];
            unset($novelData['stores']);
            $book = DB::table("books")->insertGetId($novelData);
            foreach ($stores as $storeId) {
                DB::table("book_store")->insert([
                    "book_id" => $book,
                    "store_id" => $storeId,
                ]);
            }
        }



        // Children Books
        $children_books = [
            [
                "stores" => [1],
                "name" => "Snow White",
                "author" => "Abdel Hamid Al-Gharbawi",
                "price" => "12.0",
                "image" => "/books_images/childrens/snowWhite.jpg",
                "amount" => "50",
                "ratings" => "4.6",
                "type" => "children",
                "details" => "The story of a beautiful girl named Snow White, who faces the jealousy of her stepmother (the evil queen) because of her beauty. Snow White escapes to the forest where she meets seven dwarfs who help her. The story addresses themes like beauty, jealousy, and friendship."
            ],
            [
                "stores" => [2],
                "name" => "Little Red Riding Hood",
                "author" => "Kamel Kilani",
                "price" => "15.0",
                "image" => "/books_images/childrens/littleredridinghood.jpg",
                "amount" => "50",
                "ratings" => "4.3",
                "type" => "children",
                "details" => "The story revolves around a girl named Little Red Riding Hood, who goes to visit her grandmother carrying a basket of food. On her way, she meets a cunning wolf trying to trick her to reach her grandmother first. The story warns against strangers and teaches children the importance of caution."
            ],
            [
                "stores" => [3],
                "name" => "Cinderella",
                "author" => "Charles Perrault",
                "price" => "17.0",
                "image" => "/books_images/childrens/Cinderella.jpg",
                "amount" => "50",
                "ratings" => "4.8",
                "type" => "children",
                "details" => "The story of a girl suffering from the oppression of her stepmother and stepsisters. With the help of a fairy, she manages to go to the prince's ball but has to leave before midnight, leaving behind a glass slipper. The prince searches for the owner of the slipper and finds Cinderella, leading to a happy ending."
            ],
            [
                "stores" => [4],
                "name" => "The Leaf Thief",
                "author" => "Alice Melvin",
                "price" => "15.99",
                "image" => "/books_images/childrens/Theleafthief.jpg",
                "amount" => "50",
                "ratings" => "4.6",
                "type" => "children",
                "details" => "A charming and beautifully illustrated children's book about a little bird who becomes concerned when all the leaves from a tree start to disappear. The bird embarks on an adventure to find the culprit and learns about the changing seasons and the importance of nature along the way."
            ],
            [
                "stores" => [5],
                "name" => "Children of the Forest",
                "author" => "Mohamed Atiya El-Ebrashy",
                "price" => "10.0",
                "image" => "/books_images/childrens/Thechildrensforest.jpg",
                "amount" => "50",
                "ratings" => "4.0",
                "type" => "children",
                "details" => "The story is about a group of children living in the forest, learning how to coexist with nature and animals. The story focuses on friendship and adventures."
            ],
            [
                "stores" => [6],
                "name" => "The Little Prince",
                "author" => "Antoine de Saint-Exupéry",
                "price" => "12.0",
                "image" => "/books_images/childrens/Thelittleprince.jpg",
                "amount" => "50",
                "ratings" => "3.9",
                "type" => "children",
                "details" => "A fantasy story about a little prince who travels from planet to planet, learning valuable lessons about life, love, and friendship. The book addresses themes like simplicity and the importance of human relationships."
            ],
            [
                "stores" => [1,6],
                "name" => "The Hare and the Tortoise",
                "author" => "Nabiha Meheidli",
                "price" => "17.0",
                "image" => "/books_images/childrens/TheHareandtheTortoise.jpg",
                "amount" => "50",
                "ratings" => "5.0",
                "type" => "children",
                "details" => "A famous story about a race between a fast hare and a slow tortoise. Despite the hare's speed, he loses the race because of his overconfidence. The story teaches a lesson about perseverance and not underestimating others."
            ],
            [
                "stores" => [2,5],
                "name" => "The Ghoul",
                "author" => "Taghreed Najjar",
                "price" => "12.99",
                "image" => "/books_images/childrens/Theghoul.jpg",
                "amount" => "50",
                "ratings" => "4.3",
                "type" => "children",
                "details" => "A spooky and fun children's book that tells the story of a young boy who encounters a ghoul while exploring an old house. The book blends adventure, mystery, and humor while teaching children to face their fears and understand the value of bravery and friendship."
            ],
            [
                "stores" => [3,4],
                "name" => "How to Catch a Mermaid",
                "author" => "Adam Wallace",
                "price" => "9.99",
                "image" => "/books_images/childrens/Howtocatchamermaid.jpg",
                "amount" => "50",
                "ratings" => "4.7",
                "type" => "children",
                "details" => "In this magical children's book, the protagonist embarks on a whimsical adventure to catch a mermaid. With vibrant illustrations and a fun narrative, the book brings together elements of fantasy, excitement, and humor to captivate young readers while encouraging creativity and imagination."
            ],
            [
                "stores" => [4,3],
                "name" => "The Smart Cookie",
                "author" => "Jory John",
                "price" => "18.95",
                "image" => "/books_images/childrens/TheSmartCookie.jpg",
                "amount" => "50",
                "ratings" => "4.8",
                "type" => "children",
                "details" => "This delightful children's book follows the journey of a cookie who feels overshadowed by the intelligence of other baked goods in the bakery. Through a series of humorous and heartwarming events, the cookie learns that intelligence comes in many forms, and self-worth isn't determined by being the smartest. The story emphasizes themes of self-acceptance and the value of diverse talents."
            ],
            [
                "stores" => [5,2],
                "name" => "Goodnight Moon",
                "author" => "Margaret Wise Brown",
                "price" => "10.0",
                "image" => "/books_images/children/good_night_moon.jpg",
                "amount" => "50",
                "ratings" => "4.7",
                "type" => "children",
                "details" => "A bedtime story featuring a bunny saying goodnight to everything in his room. The rhythmic text and gentle illustrations help young children wind down for bed."
            ],
            [
                "stores" => [6,1],
                "name" => "The Very Hungry Caterpillar",
                "author" => "Eric Carle",
                "price" => "12.0",
                "image" => "/books_images/children/the_very_hungry_cate.jpg",
                "amount" => "50",
                "ratings" => "4.5",
                "type" => "children",
                "details" => "A caterpillar eats through various foods before transforming into a butterfly. The book teaches growth, transformation, and days of the week through colorful illustrations."
            ]
        ];
        foreach ($children_books as $childernData) {
            $stores = $childernData['stores'];
            unset($childernData['stores']);
            $book = DB::table("books")->insertGetId($childernData);
            foreach ($stores as $storeId) {
                DB::table("book_store")->insert([
                    "book_id" => $book,
                    "store_id" => $storeId,
                ]);
            }
        }

        // culture Books
        $culture_books = [
            [
                "stores" => [1],
                "name" => "I will Betray My Country",
                "author" => "Mohamed Maghout",
                "price" => "13.0",
                "image" => "/books_images/culture/IwillBetrayMyCountry.jpg",
                "amount" => "50",
                "ratings" => "4.5",
                "type" => "culture",
                "details" => "The book addresses issues of identity and belonging, raising questions about nationalism and different attitudes towards one's homeland."
            ],
            [
                "stores" => [2],
                "name" => "Being and Nothingness",
                "author" => "Jean-Paul Sartre",
                "price" => "15.0",
                "image" => "/books_images/culture/BeingandNothingness.jpg",
                "amount" => "50",
                "ratings" => "4.3",
                "type" => "culture",
                "details" => "The book explores existential philosophy, studying the nature of existence, freedom, and choice."
            ],
            [
                "stores" => [3],
                "name" => "Rich Dad Poor Dad",
                "author" => "Robert T. Kiyosaki",
                "price" => "12.0",
                "image" => "/books_images/culture/RichDadPoorDad.jpg",
                "amount" => "50",
                "ratings" => "4.6",
                "type" => "culture",
                "details" => "The book offers financial lessons and investment advice through the author's life stories and his experiences with his 'rich dad' and 'poor dad.'"
            ],
            [
                "stores" => [4],
                "name" => "1984",
                "author" => "George Orwell",
                "price" => "10.0",
                "image" => "/books_images/culture/1982.jpg",
                "amount" => "50",
                "ratings" => "4.8",
                "type" => "culture",
                "details" => "A dystopian novel about a total surveillance system and the loss of freedom, serving as a warning against absolute power."
            ],
            [
                "stores" => [5],
                "name" => "Think and Grow Rich",
                "author" => "Napoleon Hill",
                "price" => "11.0",
                "image" => "/books_images/culture/Thinkandgrowrich.jpg",
                "amount" => "50",
                "ratings" => "4.7",
                "type" => "culture",
                "details" => "The book provides strategies for achieving financial success through positive thinking and planning."
            ],
            [
                "stores" => [6],
                "name" => "The Nile: A Journey Through Egypt's Past and Present",
                "author" => "Tarek Heggy",
                "price" => "15.99",
                "image" => "/books_images/culture/TheNile.jpg",
                "amount" => "50",
                "ratings" => "4.5",
                "type" => "culture",
                "details" => "This book explores the history and cultural significance of the Nile River, examining its profound impact on Egypt’s civilization, from ancient times to the modern era."
            ],
            [
                "stores" => [1,6],
                "name" => "The Power of Now",
                "author" => "Eckhart Tolle",
                "price" => "14.0",
                "image" => "/books_images/culture/Thepowerofnow.jpg",
                "amount" => "50",
                "ratings" => "4.5",
                "type" => "culture",
                "details" => "The book discusses the importance of living in the present moment and achieving inner peace."
            ],
            [
                "stores" => [2,5],
                "name" => "Men Are from Mars, Women Are from Venus",
                "author" => "John Gray",
                "price" => "9.0",
                "image" => "/books_images/culture/MenarefromMars-WomanarefromVenus.jpg",
                "amount" => "50",
                "ratings" => "4.5",
                "type" => "culture",
                "details" => "The book addresses the psychological and behavioral differences between men and women, offering tips for improving relationships."
            ],
            [
                "stores" => [3,4],
                "name" => "The Muqaddimah",
                "author" => "Ibn Khaldun",
                "price" => "14.99",
                "image" => "/books_images/culture/TheMuqaddimah.jpg",
                "amount" => "50",
                "ratings" => "4.6",
                "type" => "culture",
                "details" => "The Muqaddimah is a foundational text in Arab intellectual history, laying the groundwork for the study of sociology, economics, and history."
            ],
            [
                "stores" => [4,3],
                "name" => "The Forty Rules of Love",
                "author" => "Elif Shafak",
                "price" => "13.0",
                "image" => "/books_images/culture/Thefortyrulesoflove.jpg",
                "amount" => "50",
                "ratings" => "4.6",
                "type" => "culture",
                "details" => "This novel intertwines a contemporary love story with the life of Jalaluddin Rumi, exploring themes of love and spirituality."
            ],
            [
                "stores" => [5,2],
                "name" => "The Story of Art",
                "author" => "E.H. Gombrich",
                "price" => "25.0",
                "image" => "/books_images/culture/the_story_of_art.jpg",
                "amount" => "50",
                "ratings" => "4.5",
                "type" => "culture",
                "details" => "A comprehensive guide to the history of art, from prehistoric to modern times, featuring key movements, artists, and their works."
            ],
            [
                "stores" => [6,1],
                "name" => "Sapiens: A Brief History of Humankind",
                "author" => "Yuval Noah Harari",
                "price" => "22.0",
                "image" => "/books_images/culture/sapiens_a_brief_history.jpg",
                "amount" => "50",
                "ratings" => "4.6",
                "type" => "culture",
                "details" => "A thought-provoking exploration of the history of humanity, from the emergence of Homo sapiens to the present day, examining our cultural, social, and technological evolution."
            ]
        ];
        foreach ($culture_books as $cultureData) {
            $stores = $cultureData['stores'];
            unset($cultureData['stores']);
            $book = DB::table("books")->insertGetId($cultureData);
            foreach ($stores as $storeId) {
                DB::table("book_store")->insert([
                    "book_id" => $book,
                    "store_id" => $storeId,
                ]);
            }
        }

        // Literary Books
        $literary_books = [
            [
                "stores" => [1],
                "name" => "The Brothers Karamazov",
                "author" => "Fyodor Dostoevsky",
                "price" => "19.0",
                "image" => "/books_images/literary/thebrotherskaramazovbookcenter.jpg",
                "amount" => "50",
                "ratings" => "4.3",
                "type" => "literary",
                "details" => "A philosophical novel that explores the conflict between faith and doubt, family relationships, and justice."
            ],
            [
                "stores" => [2],
                "name" => "Love in the Time of Cholera",
                "author" => "Gabriel Garcia Marquez",
                "price" => "18.0",
                "image" => "/books_images/literary/Loveinthetimeofcholera.jpg",
                "amount" => "50",
                "ratings" => "4.0",
                "type" => "literary",
                "details" => "A romantic novel that spans decades, exploring the concepts of love and patience."
            ],
            [
                "stores" => [3],
                "name" => "The Picture of Dorian Gray",
                "author" => "Oscar Wilde",
                "price" => "13.99",
                "image" => "/books_images/literary/thepictureofdoriangray.jpg",
                "amount" => "50",
                "ratings" => "4.2",
                "type" => "literary",
                "details" => "'The Picture of Dorian Gray' by Oscar Wilde explores themes of vanity, decadence, and the consequences of indulgence. Dorian Gray wishes for his portrait to age instead of him, leading to a life of moral decay and eventual destruction."
            ],
            [
                "stores" => [4],
                "name" => "Crime and Punishment",
                "author" => "Fyodor Dostoevsky",
                "price" => "18.0",
                "image" => "/books_images/literary/Crimeandpunishment.jpg",
                "amount" => "50",
                "ratings" => "4.0",
                "type" => "literary",
                "details" => "A novel that delves into the psychological and moral struggles of a young man who commits a crime and deals with its consequences."
            ],
            [
                "stores" => [5],
                "name" => "The Odyssey",
                "author" => "Homer",
                "price" => "12.0",
                "image" => "/books_images/literary/Theodyssey.jpg",
                "amount" => "50",
                "ratings" => "4.0",
                "type" => "literary",
                "details" => "An epic poem that recounts the adventures of Odysseus as he returns home after the Trojan War."
            ],
            [
                "stores" => [6],
                "name" => "One Hundred Years of Solitude",
                "author" => "Gabriel Garcia Marquez",
                "price" => "20.0",
                "image" => "/books_images/literary/Onehundredyearsofsolitude.jpg",
                "amount" => "50",
                "ratings" => "4.0",
                "type" => "literary",
                "details" => "A novel that traces the history of the Buendia family in the village of Macondo, addressing themes of isolation and destiny."
            ],
            [
                "stores" => [1,6],
                "name" => "Things Fall Apart",
                "author" => "Chinua Achebe",
                "price" => "11.0",
                "image" => "/books_images/literary/Thingsfallapart.jpg",
                "amount" => "50",
                "ratings" => "4.0",
                "type" => "literary",
                "details" => "A novel that explores the impact of colonialism on African culture through the life story of a tribal leader."
            ],
            [
                "stores" => [2,5],
                "name" => "The Little Prince",
                "author" => "Antoine de Saint-Exupéry",
                "price" => "9.0",
                "image" => "/books_images/literary/Thelittleprince.jpg",
                "amount" => "50",
                "ratings" => "4.0",
                "type" => "literary",
                "details" => "A fantasy story addressing themes of friendship, innocence, and the true meaning of life through the adventures of the little prince."
            ],
            [
                "stores" => [3,4],
                "name" => "Blindness",
                "author" => "José Saramago",
                "price" => "14.0",
                "image" => "/books_images/literary/Blindness.jpg",
                "amount" => "50",
                "ratings" => "4.0",
                "type" => "literary",
                "details" => "A novel that explores the spread of a blindness epidemic in a city and its social consequences."
            ],
            [
                "stores" => [4,3],
                "name" => "For Bread Alone",
                "author" => "Mohamed Choukri",
                "price" => "8.0",
                "image" => "/books_images/literary/Forbreadalone.jpg",
                "amount" => "50",
                "ratings" => "4.0",
                "type" => "literary",
                "details" => "An autobiography narrating the life of a Moroccan writer growing up in harsh conditions and overcoming challenges."
            ],
            [
                "stores" => [5,2],
                "name" => "The Great Gatsby",
                "author" => "F. Scott Fitzgerald",
                "price" => "15.0",
                "image" => "/books_images/literary/the_great_gatsby.jpg",
                "amount" => "50",
                "ratings" => "4.4",
                "type" => "literary",
                "details" => "A tragic tale of love, ambition, and the American Dream, set in the opulent 1920s and centered on the enigmatic Jay Gatsby."
            ],
            [
                "stores" => [6,1],
                "name" => "Pride and Prejudice",
                "author" => "Jane Austen",
                "price" => "15.0",
                "image" => "/books_images/literary/pride_and_prejudice.jpg",
                "amount" => "50",
                "ratings" => "4.3",
                "type" => "literary",
                "details" => "A timeless romance that explores themes of love, class, and societal expectations through the story of Elizabeth Bennet and Mr. Darcy."
            ]
        ];
        foreach ($literary_books as $literaryData) {
            $stores = $literaryData['stores'];
            unset($literaryData['stores']);
            $book = DB::table("books")->insertGetId($literaryData);
            foreach ($stores as $storeId) {
                DB::table("book_store")->insert([
                    "book_id" => $book,
                    "store_id" => $storeId,
                ]);
            }
        }

        // scientific Books
        $scientific_books = [
            [
                "stores" => [1],
                "name" => "The Brain: The Myth of Formation",
                "author" => "David Eagleman",
                "price" => "15.0",
                "image" => "/books_images/scientific/TheBrain.jpg",
                "amount" => "50",
                "ratings" => "4.0",
                "type" => "scientific",
                "details" => "This book by Dr. Ibrahim Al-Feki, a psychologist and human development specialist, aims to provide a deep understanding of how the human brain works and how to use it to achieve personal success and self-development."
            ],
            [
                "stores" => [2],
                "name" => "The Demon-Haunted World",
                "author" => "Carl Sagan",
                "price" => "14.0",
                "image" => "/books_images/scientific/Thedemonhantedworld.jpg",
                "amount" => "50",
                "ratings" => "4.5",
                "type" => "scientific",
                "details" => "This book emphasizes the importance of critical and scientific thinking in confronting myths and misconceptions. Carl Sagan, an American astronomer, highlights the role of science in human progress and explains how we can better understand the world through the scientific method."
            ],
            [
                "stores" => [3],
                "name" => "On the Shoulders of Giants",
                "author" => "Stephen Hawking",
                "price" => "17.0",
                "image" => "/books_images/scientific/Ontheshouldersofgiants.jpg",
                "amount" => "50",
                "ratings" => "4.6",
                "type" => "scientific",
                "details" => "This book is a collection of key works by several scientists who significantly contributed to our understanding of the universe, including Newton, Copernicus, and Kepler. Hawking connects these ideas and explains how they contributed to the development of physics."
            ],
            [
                "stores" => [4],
                "name" => "The Theory of Everything",
                "author" => "Stephen Hawking",
                "price" => "18.0",
                "image" => "/books_images/scientific/TheTheoryofeverything.jpg",
                "amount" => "50",
                "ratings" => "4.7",
                "type" => "scientific",
                "details" => "In this book, Hawking describes his intellectual journey to understand the universe, from its origins to his attempts to formulate a 'theory of everything' that aims to unify the laws of physics. The book is written in a simple way for the general reader."
            ],
            [
                "stores" => [5],
                "name" => "The Universe in a Nutshell",
                "author" => "Stephen Hawking",
                "price" => "16.0",
                "image" => "/books_images/scientific/TheUniverseinaNutshell.jpg",
                "amount" => "50",
                "ratings" => "4.8",
                "type" => "scientific",
                "details" => "In this book, Hawking addresses major questions in cosmology, such as the nature of time and space. The book is characterized by its simplicity in explanation and is considered an introduction to astronomy and theoretical physics in an uncomplicated way."
            ],
            [
                "stores" => [6],
                "name" => "A Brief History of Time",
                "author" => "Stephen Hawking",
                "price" => "20.0",
                "image" => "/books_images/scientific/ABriefHistoryofTime.jpg",
                "amount" => "50",
                "ratings" => "4.9",
                "type" => "scientific",
                "details" => "This groundbreaking book explores the nature of time and space, the universe's origin, and its eventual fate. Written by renowned physicist Stephen Hawking, it provides an accessible explanation of cosmology for readers without a scientific background."
            ],
            [
                "stores" => [1,6],
                "name" => "The Selfish Gene",
                "author" => "Richard Dawkins",
                "price" => "16.0",
                "image" => "/books_images/scientific/TheSelfishGene.jpg",
                "amount" => "50",
                "ratings" => "4.6",
                "type" => "scientific",
                "details" => "Dawkins redefines the way we see natural selection and evolution by emphasizing the role of genes as the fundamental units of selection. This book popularized the concept of 'selfish' genes driving biological processes."
            ],
            [
                "stores" => [2,5],
                "name" => "Cosmos",
                "author" => "Carl Sagan",
                "price" => "22.0",
                "image" => "/books_images/scientific/Cosmos.jpg",
                "amount" => "50",
                "ratings" => "4.8",
                "type" => "scientific",
                "details" => "In this beautifully written book, Carl Sagan explores the evolution of the universe, life, and humanity’s place in the vast cosmos. It combines scientific insight with poetic language to inspire awe and wonder about the universe."
            ],
            [
                "stores" => [3,4],
                "name" => "Sapiens: A Brief History of Humankind",
                "author" => "Yuval Noah Harari",
                "price" => "19.0",
                "image" => "/books_images/scientific/Sapiens.jpg",
                "amount" => "50",
                "ratings" => "4.7",
                "type" => "scientific",
                "details" => "Harari traces the history of humankind from the Stone Age to the present, discussing how Homo sapiens came to dominate the planet and the impact of our evolution on society, culture, and the environment."
            ],
            [
                "stores" => [4,3],
                "name" => "The Gene: An Intimate History",
                "author" => "Siddhartha Mukherjee",
                "price" => "17.0",
                "image" => "/books_images/scientific/TheGeneAnIntimateHistory.jpg",
                "amount" => "50",
                "ratings" => "4.6",
                "type" => "scientific",
                "details" => "This book takes a deep dive into the history of the gene, from its early discovery to its profound implications in medicine and the future of genetics. Mukherjee weaves a personal narrative alongside scientific exploration."
            ],
            [
                "stores" => [5,2],
                "name" => "Why We Sleep",
                "author" => "Matthew Walker",
                "price" => "17.0",
                "image" => "/books_images/scientific/why_we_sleep.jpg",
                "amount" => "50",
                "ratings" => "4.6",
                "type" => "scientific",
                "details" => "An exploration of the science of sleep, explaining its vital role in health, memory, and creativity."
            ],
            [
                "stores" => [6,1],
                "name" => "The Origin of Species",
                "author" => "Charles Darwin",
                "price" => "15.0",
                "image" => "/books_images/scientific/the_origin_of_species.jpg",
                "amount" => "50",
                "ratings" => "4.3",
                "type" => "scientific",
                "details" => "Darwin's foundational work on evolution and natural selection."
            ]
        ];
        foreach ($scientific_books as $scientificData) {
            $stores = $scientificData['stores'];
            unset($scientificData['stores']);
            $book = DB::table("books")->insertGetId($scientificData);
            foreach ($stores as $storeId) {
                DB::table("book_store")->insert([
                    "book_id" => $book,
                    "store_id" => $storeId,
                ]);
            }
        }
    }
}
