<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IndicatorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $indicators = [
            [
                "id" => 1,
                "name" => "By 2030, eradicate extreme poverty for all people everywhere, currently measured as people living on less than $1.25 a day",
                "order" => "1.1",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 1
            ],
            [
                "id" => 2,
                "name" => "By 2030, reduce at least by half the proportion of men, women and children of all ages living in poverty in all its dimensions according to national definitions",
                "order" => "1.2",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 1
            ],
            [
                "id" => 3,
                "name" => "Implement nationally appropriate social protection systems and measures for all, including floors, and by 2030 achieve substantial coverage of the poor and the vulnerable",
                "order" => "1.3",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 1
            ],
            [
                "id" => 4,
                "name" => "By 2030, ensure that all men and women, in particular the poor and the vulnerable, have equal rights to economic resources, as well as access to basic services, ownership and control over land and other forms of property, inheritance, natural resources, appropriate new technology and financial services, including microfinance",
                "order" => "1.4",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 1
            ],
            [
                "id" => 5,
                "name" => "By 2030, build the resilience of the poor and those in vulnerable situations and reduce their exposure and vulnerability to climate-related extreme events and other economic, social and environmental shocks and disasters",
                "order" => "1.5",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 1
            ],
            [
                "id" => 6,
                "name" => "Ensure significant mobilization of resources from a variety of sources, including through enhanced development cooperation, in order to provide adequate and predictable means for developing countries, in particular least developed countries, to implement programmes and policies to end poverty in all its dimensions",
                "order" => "1.a",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 1
            ],
            [
                "id" => 7,
                "name" => "Create sound policy frameworks at the national, regional and international levels, based on pro-poor and gender-sensitive development strategies, to support accelerated investment in poverty eradication actions",
                "order" => "1.b",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 1
            ],
            [
                "id" => 8,
                "name" => "Proportion of population below the international poverty line, by sex, age, employment status and geographical location (urban/rural)",
                "order" => "1.1.1",
                "level" => 2,
                "parent_indicator_id" => 1,
                "description" => null,
                "sdg_id" => 1
            ],
            [
                "id" => 9,
                "name" => "Proportion of population living below the national poverty line, by sex and age",
                "order" => "1.2.1",
                "level" => 2,
                "parent_indicator_id" => 2,
                "description" => null,
                "sdg_id" => 1
            ],
            [
                "id" => 10,
                "name" => "Proportion of men, women and children of all ages living in poverty in all its dimensions according to national definitions",
                "order" => "1.2.2",
                "level" => 2,
                "parent_indicator_id" => 2,
                "description" => null,
                "sdg_id" => 1
            ],
            [
                "id" => 11,
                "name" => "Proportion of population covered by social protection floors/systems, by sex, distinguishing children, unemployed persons, older persons, persons with disabilities, pregnant women, newborns, work-injury victims and the poor and the vulnerable",
                "order" => "1.3.1",
                "level" => 2,
                "parent_indicator_id" => 3,
                "description" => null,
                "sdg_id" => 1
            ],
            [
                "id" => 12,
                "name" => "Proportion of population living in households with access to basic services",
                "order" => "1.4.1",
                "level" => 2,
                "parent_indicator_id" => 4,
                "description" => null,
                "sdg_id" => 1
            ],
            [
                "id" => 13,
                "name" => "Proportion of total adult population with secure tenure rights to land, with legally recognized documentation and who perceive their rights to land as secure, by sex and by type of tenure",
                "order" => "1.4.2",
                "level" => 2,
                "parent_indicator_id" => 4,
                "description" => null,
                "sdg_id" => 1
            ],
            [
                "id" => 14,
                "name" => "Number of deaths, missing persons and persons affected by disaster per 100,000 people",
                "order" => "1.5.1",
                "level" => 2,
                "parent_indicator_id" => 5,
                "description" => null,
                "sdg_id" => 1
            ],
            [
                "id" => 15,
                "name" => "Direct disaster economic loss in relation to global gross domestic product (GDP)",
                "order" => "1.5.2",
                "level" => 2,
                "parent_indicator_id" => 5,
                "description" => null,
                "sdg_id" => 1
            ],
            [
                "id" => 16,
                "name" => "Number of countries with national and local disaster risk reduction strategies",
                "order" => "1.5.3",
                "level" => 2,
                "parent_indicator_id" => 5,
                "description" => null,
                "sdg_id" => 1
            ],
            [
                "id" => 17,
                "name" => "Proportion of resources allocated by the government directly to poverty reduction programmes",
                "order" => "1.a.1",
                "level" => 2,
                "parent_indicator_id" => 6,
                "description" => null,
                "sdg_id" => 1
            ],
            [
                "id" => 18,
                "name" => "Proportion of total government spending on essential services (education, health and social protection)",
                "order" => "1.a.2",
                "level" => 2,
                "parent_indicator_id" => 6,
                "description" => null,
                "sdg_id" => 1
            ],
            [
                "id" => 19,
                "name" => "Proportion of government recurrent and capital spending to sectors that disproportionately benefit women, the poor and vulnerable groups",
                "order" => "1.b.1",
                "level" => 2,
                "parent_indicator_id" => 7,
                "description" => null,
                "sdg_id" => 1
            ],
            [
                "id" => 20,
                "name" => "By 2030, end hunger and ensure access by all people, in particular the poor and people in vulnerable situations, including infants, to safe, nutritious and sufficient food all year round",
                "order" => "2.1",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 2
            ],
            [
                "id" => 21,
                "name" => "By 2030, end all forms of malnutrition, including achieving, by 2025, the internationally agreed targets on stunting and wasting in children under 5 years of age, and address the nutritional needs of adolescent girls, pregnant and lactating women and older persons",
                "order" => "2.2",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 2
            ],
            [
                "id" => 22,
                "name" => "By 2030, double the agricultural productivity and incomes of small-scale food producers, in particular women, indigenous peoples, family farmers, pastoralists and fishers, including through secure and equal access to land, other productive resources and inputs, knowledge, financial services, markets and opportunities for value addition and non-farm employment",
                "order" => "2.3",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 2
            ],
            [
                "id" => 23,
                "name" => "By 2030, ensure sustainable food production systems and implement resilient agricultural practices that increase productivity and production, that help maintain ecosystems, that strengthen capacity for adaptation to climate change, extreme weather, drought, flooding and other disasters and that progressively improve land and soil quality",
                "order" => "2.4",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 2
            ],
            [
                "id" => 24,
                "name" => "By 2020, maintain the genetic diversity of seeds, cultivated plants and farmed and domesticated animals and their related wild species, including through soundly managed and diversified seed and plant banks at the national, regional and international levels, and promote access to and fair and equitable sharing of benefits arising from the utilization of genetic resources and associated traditional knowledge, as internationally agreed",
                "order" => "2.5",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 2
            ],
            [
                "id" => 25,
                "name" => "Increase investment, including through enhanced international cooperation, in rural infrastructure, agricultural research and extension services, technology development and plant and livestock gene banks in order to enhance agricultural productive capacity in developing countries, in particular least developed countries",
                "order" => "2.a",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 2
            ],
            [
                "id" => 26,
                "name" => "Correct and prevent trade restrictions and distortions in world agricultural markets, including through the parallel elimination of all forms of agricultural export subsidies and all export measures with equivalent effect, in accordance with the mandate of the Doha Development Round",
                "order" => "2.b",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 2
            ],
            [
                "id" => 27,
                "name" => "Adopt measures to ensure the proper functioning of food commodity markets and their derivatives and facilitate timely access to market information, including on food reserves, in order to help limit extreme food price volatility",
                "order" => "2.c",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 2
            ],
            [
                "id" => 28,
                "name" => "Prevalence of undernourishment",
                "order" => "2.1.1",
                "level" => 2,
                "parent_indicator_id" => 20,
                "description" => null,
                "sdg_id" => 2
            ],
            [
                "id" => 29,
                "name" => "Prevalence of moderate or severe food insecurity in the population, based on the Food Insecurity Experience Scale (FIES)",
                "order" => "2.1.2",
                "level" => 2,
                "parent_indicator_id" => 20,
                "description" => null,
                "sdg_id" => 2
            ],
            [
                "id" => 30,
                "name" => "Prevalence of stunting (height for age <-2 standard deviation from the median of the World Health Organization (WHO) Child Growth Standards) among children under 5 years of age",
                "order" => "2.2.1",
                "level" => 2,
                "parent_indicator_id" => 21,
                "description" => null,
                "sdg_id" => 2
            ],
            [
                "id" => 31,
                "name" => "Prevalence of malnutrition (weight for height >+2 or <-2 standard deviation from the median of the WHO Child Growth Standards) among children under 5 years of age, by type (wasting and overweight)",
                "order" => "2.2.2",
                "level" => 2,
                "parent_indicator_id" => 21,
                "description" => null,
                "sdg_id" => 2
            ],
            [
                "id" => 32,
                "name" => "Volume of production per labour unit by classes of farming/pastoral/forestry enterprise size",
                "order" => "2.3.1",
                "level" => 2,
                "parent_indicator_id" => 22,
                "description" => null,
                "sdg_id" => 2
            ],
            [
                "id" => 33,
                "name" => "Average income of small-scale food producers, by sex and indigenous status",
                "order" => "2.3.2",
                "level" => 2,
                "parent_indicator_id" => 22,
                "description" => null,
                "sdg_id" => 2
            ],
            [
                "id" => 34,
                "name" => "Proportion of agricultural area under productive and sustainable agriculture",
                "order" => "2.4.1",
                "level" => 2,
                "parent_indicator_id" => 23,
                "description" => null,
                "sdg_id" => 2
            ],
            [
                "id" => 35,
                "name" => "Number of plant and animal genetic resources for food and agriculture secured in either medium or long-term conservation facilities",
                "order" => "2.5.1",
                "level" => 2,
                "parent_indicator_id" => 24,
                "description" => null,
                "sdg_id" => 2
            ],
            [
                "id" => 36,
                "name" => "Proportion of local breeds classified as being at risk, not-at-risk or at unknown level of risk of extinction",
                "order" => "2.5.2",
                "level" => 2,
                "parent_indicator_id" => 24,
                "description" => null,
                "sdg_id" => 2
            ],
            [
                "id" => 37,
                "name" => "The agriculture orientation index for government expenditures",
                "order" => "2.a.1",
                "level" => 2,
                "parent_indicator_id" => 25,
                "description" => null,
                "sdg_id" => 2
            ],
            [
                "id" => 38,
                "name" => "Total official flows (official development assistance plus other official flows) to the agriculture sector",
                "order" => "2.a.2",
                "level" => 2,
                "parent_indicator_id" => 25,
                "description" => null,
                "sdg_id" => 2
            ],
            [
                "id" => 39,
                "name" => "Producer Support Estimate",
                "order" => "2.b.1",
                "level" => 2,
                "parent_indicator_id" => 26,
                "description" => null,
                "sdg_id" => 2
            ],
            [
                "id" => 40,
                "name" => "Agricultural export subsidies",
                "order" => "2.b.2",
                "level" => 2,
                "parent_indicator_id" => 26,
                "description" => null,
                "sdg_id" => 2
            ],
            [
                "id" => 41,
                "name" => "Indicator of food price anomalies",
                "order" => "2.c.1",
                "level" => 2,
                "parent_indicator_id" => 27,
                "description" => null,
                "sdg_id" => 2
            ],
            [
                "id" => 42,
                "name" => "By 2030, reduce the global maternal mortality ratio to less than 70 per 100,000 live births",
                "order" => "3.1",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 3
            ],
            [
                "id" => 43,
                "name" => "By 2030, end preventable deaths of newborns and children under 5 years of age, with all countries aiming to reduce neonatal mortality to at least as low as 12 per 1,000 live births and under-5 mortality to at least as low as 25 per 1,000 live births",
                "order" => "3.2",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 3
            ],
            [
                "id" => 44,
                "name" => "By 2030, end the epidemics of AIDS, tuberculosis, malaria and neglected tropical diseases and combat hepatitis, water-borne diseases and other communicable diseases",
                "order" => "3.3",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 3
            ],
            [
                "id" => 45,
                "name" => "By 2030, reduce by one third premature mortality from non-communicable diseases through prevention and treatment and promote mental health and well-being",
                "order" => "3.4",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 3
            ],
            [
                "id" => 46,
                "name" => "Strengthen the prevention and treatment of substance abuse, including narcotic drug abuse and harmful use of alcohol",
                "order" => "3.5",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 3
            ],
            [
                "id" => 47,
                "name" => "By 2020, halve the number of global deaths and injuries from road traffic accidents",
                "order" => "3.6",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 3
            ],
            [
                "id" => 48,
                "name" => "By 2030, ensure universal access to sexual and reproductive health-care services, including for family planning, information and education, and the integration of reproductive health into national strategies and programmes",
                "order" => "3.7",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 3
            ],
            [
                "id" => 49,
                "name" => "Achieve universal health coverage, including financial risk protection, access to quality essential health-care services and access to safe, effective, quality and affordable essential medicines and vaccines for all",
                "order" => "3.8",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 3
            ],
            [
                "id" => 50,
                "name" => "By 2030, substantially reduce the number of deaths and illnesses from hazardous chemicals and air, water and soil pollution and contamination",
                "order" => "3.9",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 3
            ],
            [
                "id" => 51,
                "name" => "Strengthen the implementation of the World Health Organization Framework Convention on Tobacco Control in all countries, as appropriate",
                "order" => "3.a",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 3
            ],
            [
                "id" => 52,
                "name" => "Support the research and development of vaccines and medicines for the communicable and non-communicable diseases that primarily affect developing countries, provide access to affordable essential medicines and vaccines, in accordance with the Doha Declaration on the TRIPS Agreement and Public Health, which affirms the right of developing countries to use to the full the provisions in the Agreement on Trade-Related Aspects of Intellectual Property Rights regarding flexibilities to protect public health, and, in particular, provide access to med",
                "order" => "3.b",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 3
            ],
            [
                "id" => 53,
                "name" => "Substantially increase health financing and the recruitment, development, training and retention of the health workforce in developing countries, especially in least developed countries and small island developing States",
                "order" => "3.c",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 3
            ],
            [
                "id" => 54,
                "name" => "Strengthen the capacity of all countries, in particular developing countries, for early warning, risk reduction and management of national and global health risks",
                "order" => "3.d",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 3
            ],
            [
                "id" => 55,
                "name" => "Maternal mortality ratio",
                "order" => "3.1.1",
                "level" => 2,
                "parent_indicator_id" => 42,
                "description" => null,
                "sdg_id" => 3
            ],
            [
                "id" => 56,
                "name" => "Proportion of births attended by skilled health personnel",
                "order" => "3.1.2",
                "level" => 2,
                "parent_indicator_id" => 42,
                "description" => null,
                "sdg_id" => 3
            ],
            [
                "id" => 57,
                "name" => "Under-five mortality rate",
                "order" => "3.2.1",
                "level" => 2,
                "parent_indicator_id" => 43,
                "description" => null,
                "sdg_id" => 3
            ],
            [
                "id" => 58,
                "name" => "Neonatal mortality rate",
                "order" => "3.2.2",
                "level" => 2,
                "parent_indicator_id" => 43,
                "description" => null,
                "sdg_id" => 3
            ],
            [
                "id" => 59,
                "name" => "Number of new HIV infections per 1,000 uninfected population, by sex, age and key populations",
                "order" => "3.3.1",
                "level" => 2,
                "parent_indicator_id" => 44,
                "description" => null,
                "sdg_id" => 3
            ],
            [
                "id" => 60,
                "name" => "Tuberculosis incidence per 1,000 population",
                "order" => "3.3.2",
                "level" => 2,
                "parent_indicator_id" => 44,
                "description" => null,
                "sdg_id" => 3
            ],
            [
                "id" => 61,
                "name" => "Malaria incidence per 1,000 population",
                "order" => "3.3.3",
                "level" => 2,
                "parent_indicator_id" => 44,
                "description" => null,
                "sdg_id" => 3
            ],
            [
                "id" => 62,
                "name" => "Hepatitis B incidence per 100,000 population",
                "order" => "3.3.4",
                "level" => 2,
                "parent_indicator_id" => 44,
                "description" => null,
                "sdg_id" => 3
            ],
            [
                "id" => 63,
                "name" => "Number of people requiring interventions against neglected tropical diseases",
                "order" => "3.3.5",
                "level" => 2,
                "parent_indicator_id" => 44,
                "description" => null,
                "sdg_id" => 3
            ],
            [
                "id" => 64,
                "name" => "Mortality rate attributed to cardiovascular disease, cancer, diabetes or chronic respiratory disease",
                "order" => "3.4.1",
                "level" => 2,
                "parent_indicator_id" => 45,
                "description" => null,
                "sdg_id" => 3
            ],
            [
                "id" => 65,
                "name" => "Suicide mortality rate",
                "order" => "3.4.2",
                "level" => 2,
                "parent_indicator_id" => 45,
                "description" => null,
                "sdg_id" => 3
            ],
            [
                "id" => 66,
                "name" => "Coverage of treatment interventions (pharmacological, psychosocial and rehabilitation and aftercare services) for substance use disorders",
                "order" => "3.5.1",
                "level" => 2,
                "parent_indicator_id" => 46,
                "description" => null,
                "sdg_id" => 3
            ],
            [
                "id" => 67,
                "name" => "Harmful use of alcohol, defined according to the national context as alcohol per capita consumption (aged 15 years and older) within a calendar year in litres of pure alcohol",
                "order" => "3.5.2",
                "level" => 2,
                "parent_indicator_id" => 46,
                "description" => null,
                "sdg_id" => 3
            ],
            [
                "id" => 68,
                "name" => "Death rate due to road traffic injuries",
                "order" => "3.6.1",
                "level" => 2,
                "parent_indicator_id" => 47,
                "description" => null,
                "sdg_id" => 3
            ],
            [
                "id" => 69,
                "name" => "Proportion of women of reproductive age (aged 15-49 years) who have their need for family planning satisfied with modern methods",
                "order" => "3.7.1",
                "level" => 2,
                "parent_indicator_id" => 48,
                "description" => null,
                "sdg_id" => 3
            ],
            [
                "id" => 70,
                "name" => "Adolescent birth rate (aged 10-14 years; aged 15-19 years) per 1,000 women in that age group",
                "order" => "3.7.2",
                "level" => 2,
                "parent_indicator_id" => 48,
                "description" => null,
                "sdg_id" => 3
            ],
            [
                "id" => 71,
                "name" => "Coverage of essential health services (defined as the average coverage of essential services based on tracer interventions that include reproductive, maternal, newborn and child health, infectious diseases, non-communicable diseases and service capacity and access, among the general and the most disadvantaged population)",
                "order" => "3.8.1",
                "level" => 2,
                "parent_indicator_id" => 49,
                "description" => null,
                "sdg_id" => 3
            ],
            [
                "id" => 72,
                "name" => "Number of people covered by health insurance or a public health system per 1,000 population",
                "order" => "3.8.2",
                "level" => 2,
                "parent_indicator_id" => 49,
                "description" => null,
                "sdg_id" => 3
            ],
            [
                "id" => 73,
                "name" => "Mortality rate attributed to household and ambient air pollution",
                "order" => "3.9.1",
                "level" => 2,
                "parent_indicator_id" => 50,
                "description" => null,
                "sdg_id" => 3
            ],
            [
                "id" => 74,
                "name" => "Mortality rate attributed to unsafe water, unsafe sanitation and lack of hygiene (exposure to unsafe Water, Sanitation and Hygiene for All (WASH) services)",
                "order" => "3.9.2",
                "level" => 2,
                "parent_indicator_id" => 50,
                "description" => null,
                "sdg_id" => 3
            ],
            [
                "id" => 75,
                "name" => "Mortality rate attributed to unintentional poisoning",
                "order" => "3.9.3",
                "level" => 2,
                "parent_indicator_id" => 50,
                "description" => null,
                "sdg_id" => 3
            ],
            [
                "id" => 76,
                "name" => "Age-standardized prevalence of current tobacco use among persons aged 15 years and older",
                "order" => "3.a.1",
                "level" => 2,
                "parent_indicator_id" => 51,
                "description" => null,
                "sdg_id" => 3
            ],
            [
                "id" => 77,
                "name" => "Proportion of the population with access to affordable medicines and vaccines on a sustainable basis",
                "order" => "3.b.1",
                "level" => 2,
                "parent_indicator_id" => 52,
                "description" => null,
                "sdg_id" => 3
            ],
            [
                "id" => 78,
                "name" => "Total net official development assistance to medical research and basic health sectors",
                "order" => "3.b.2",
                "level" => 2,
                "parent_indicator_id" => 52,
                "description" => null,
                "sdg_id" => 3
            ],
            [
                "id" => 79,
                "name" => "Health worker density and distribution",
                "order" => "3.c.1",
                "level" => 2,
                "parent_indicator_id" => 53,
                "description" => null,
                "sdg_id" => 3
            ],
            [
                "id" => 80,
                "name" => "International Health Regulations (IHR) capacity and health emergency preparedness",
                "order" => "3.d.1",
                "level" => 2,
                "parent_indicator_id" => 54,
                "description" => null,
                "sdg_id" => 3
            ],
            [
                "id" => 81,
                "name" => "By 2030, ensure that all girls and boys complete free, equitable and quality primary and secondary education leading to relevant and effective learning outcomes",
                "order" => "4.1",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 4
            ],
            [
                "id" => 82,
                "name" => "By 2030, ensure that all girls and boys have access to quality early childhood development, care and pre-primary education so that they are ready for primary education",
                "order" => "4.2",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 4
            ],
            [
                "id" => 83,
                "name" => "By 2030, ensure equal access for all women and men to affordable and quality technical, vocational and tertiary education, including university",
                "order" => "4.3",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 4
            ],
            [
                "id" => 84,
                "name" => "By 2030, substantially increase the number of youth and adults who have relevant skills, including technical and vocational skills, for employment, decent jobs and entrepreneurship",
                "order" => "4.4",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 4
            ],
            [
                "id" => 85,
                "name" => "By 2030, eliminate gender disparities in education and ensure equal access to all levels of education and vocational training for the vulnerable, including persons with disabilities, indigenous peoples and children in vulnerable situations",
                "order" => "4.5",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 4
            ],
            [
                "id" => 86,
                "name" => "By 2030, ensure that all youth and a substantial proportion of adults, both men and women, achieve literacy and numeracy",
                "order" => "4.6",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 4
            ],
            [
                "id" => 87,
                "name" => "By 2030, ensure that all learners acquire the knowledge and skills needed to promote sustainable development, including, among others, through education for sustainable development and sustainable lifestyles, human rights, gender equality, promotion of a culture of peace and non-violence, global citizenship and appreciation of cultural diversity and of culture s contribution to sustainable development",
                "order" => "4.7",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 4
            ],
            [
                "id" => 88,
                "name" => "Build and upgrade education facilities that are child, disability and gender sensitive and provide safe, non-violent, inclusive and effective learning environments for all",
                "order" => "4.a",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 4
            ],
            [
                "id" => 89,
                "name" => "By 2020, substantially expand globally the number of scholarships available to developing countries, in particular least developed countries, small island developing States and African countries, for enrolment in higher education, including vocational training and information and communications technology, technical, engineering and scientific programmes, in developed countries and other developing countries",
                "order" => "4.b",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 4
            ],
            [
                "id" => 90,
                "name" => "By 2030, substantially increase the supply of qualified teachers, including through international cooperation for teacher training in developing countries, especially least developed countries and small island developing States",
                "order" => "4.c",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 4
            ],
            [
                "id" => 91,
                "name" => "Proportion of children and young people: (a) in grades 2/3; (b) at the end of primary; and (c) at the end of lower secondary achieving at least a minimum proficiency level in (i) reading and (ii) mathematics, by sex",
                "order" => "4.1.1",
                "level" => 2,
                "parent_indicator_id" => 81,
                "description" => null,
                "sdg_id" => 4
            ],
            [
                "id" => 92,
                "name" => "Proportion of children under 5 years of age who are developmentally on track in health, learning and psychosocial well-being, by sex",
                "order" => "4.2.1",
                "level" => 2,
                "parent_indicator_id" => 82,
                "description" => null,
                "sdg_id" => 4
            ],
            [
                "id" => 93,
                "name" => "Participation rate in organized learning (one year before the official primary entry age), by sex",
                "order" => "4.2.2",
                "level" => 2,
                "parent_indicator_id" => 82,
                "description" => null,
                "sdg_id" => 4
            ],
            [
                "id" => 94,
                "name" => "Participation rate of youth and adults in formal and non-formal education and training in the previous 12 months, by sex",
                "order" => "4.3.1",
                "level" => 2,
                "parent_indicator_id" => 83,
                "description" => null,
                "sdg_id" => 4
            ],
            [
                "id" => 95,
                "name" => "Proportion of youth and adults with information and communications technology (ICT) skills, by type of skill",
                "order" => "4.4.1",
                "level" => 2,
                "parent_indicator_id" => 84,
                "description" => null,
                "sdg_id" => 4
            ],
            [
                "id" => 96,
                "name" => "Parity indices (female/male, rural/urban, bottom/top wealth quintile and others such as disability status, indigenous peoples and conflict affected, as data become available) for all education indicators on this list that can be disaggregated",
                "order" => "4.5.1",
                "level" => 2,
                "parent_indicator_id" => 85,
                "description" => null,
                "sdg_id" => 4
            ],
            [
                "id" => 97,
                "name" => "Percentage of population in a given age group achieving at least a fixed level of proficiency in functional (a) literacy and (b) numeracy skills, by sex",
                "order" => "4.6.1",
                "level" => 2,
                "parent_indicator_id" => 86,
                "description" => null,
                "sdg_id" => 4
            ],
            [
                "id" => 98,
                "name" => "Extent to which (i) global citizenship education and (ii) education for sustainable development, including gender equality and human rights, are mainstreamed at all levels in: (a) national education policies, (b) curricula, (c) teacher education and (d) student assessment",
                "order" => "4.7.1",
                "level" => 2,
                "parent_indicator_id" => 87,
                "description" => null,
                "sdg_id" => 4
            ],
            [
                "id" => 99,
                "name" => "Proportion of schools with access to: (a) electricity; (b) the Internet for pedagogical purposes; (c) computers for pedagogical purposes; (d) adapted infrastructure and materials for students with disabilities; (e) basic drinking water; (f) single sex basic sanitation facilities; and (g) basic handwashing facilities (as per the WASH indicator definitions)",
                "order" => "4.a.1",
                "level" => 2,
                "parent_indicator_id" => 88,
                "description" => null,
                "sdg_id" => 4
            ],
            [
                "id" => 100,
                "name" => "Volume of official development assistance flows for scholarships by sector and type of study",
                "order" => "4.b.1",
                "level" => 2,
                "parent_indicator_id" => 89,
                "description" => null,
                "sdg_id" => 4
            ],
            [
                "id" => 101,
                "name" => "Proportion of teachers in: (a) pre-primary; (b) primary; (c) lower secondary; and (d) upper secondary education who have received at least the minimum organized teacher training (e.g. pedagogical training) pre-service or in-service required for teaching at the relevant level in a given country",
                "order" => "4.c.1",
                "level" => 2,
                "parent_indicator_id" => 90,
                "description" => null,
                "sdg_id" => 4
            ],
            [
                "id" => 102,
                "name" => "End all forms of discrimination against all women and girls everywhere",
                "order" => "5.1",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 5
            ],
            [
                "id" => 103,
                "name" => "Eliminate all forms of violence against all women and girls in the public and private spheres, including trafficking and sexual and other types of exploitation",
                "order" => "5.2",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 5
            ],
            [
                "id" => 104,
                "name" => "Eliminate all harmful practices, such as child, early and forced marriage and female genital mutilation",
                "order" => "5.3",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 5
            ],
            [
                "id" => 105,
                "name" => "Recognize and value unpaid care and domestic work through the provision of public services, infrastructure and social protection policies and the promotion of shared responsibility within the household and the family as nationally appropriate",
                "order" => "5.4",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 5
            ],
            [
                "id" => 106,
                "name" => "Ensure women s full and effective participation and equal opportunities for leadership at all levels of decision-making in political, economic and public life",
                "order" => "5.5",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 5
            ],
            [
                "id" => 107,
                "name" => "Ensure universal access to sexual and reproductive health and reproductive rights as agreed in accordance with the Programme of Action of the International Conference on Population and Development and the Beijing Platform for Action and the outcome documents of their review conferences",
                "order" => "5.6",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 5
            ],
            [
                "id" => 108,
                "name" => "Undertake reforms to give women equal rights to economic resources, as well as access to ownership and control over land and other forms of property, financial services, inheritance and natural resources, in accordance with national laws",
                "order" => "5.a",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 5
            ],
            [
                "id" => 109,
                "name" => "Enhance the use of enabling technology, in particular information and communications technology, to promote the empowerment of women",
                "order" => "5.b",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 5
            ],
            [
                "id" => 110,
                "name" => "Adopt and strengthen sound policies and enforceable legislation for the promotion of gender equality and the empowerment of all women and girls at all levels",
                "order" => "5.c",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 5
            ],
            [
                "id" => 111,
                "name" => "Whether or not legal frameworks are in place to promote, enforce and monitor equality and non-discrimination on the basis of sex",
                "order" => "5.1.1",
                "level" => 2,
                "parent_indicator_id" => 102,
                "description" => null,
                "sdg_id" => 5
            ],
            [
                "id" => 112,
                "name" => "Proportion of ever-partnered women and girls aged 15 years and older subjected to physical, sexual or psychological violence by a current or former intimate partner in the previous 12 months, by form of violence and by age",
                "order" => "5.2.1",
                "level" => 2,
                "parent_indicator_id" => 103,
                "description" => null,
                "sdg_id" => 5
            ],
            [
                "id" => 113,
                "name" => "Proportion of women and girls aged 15 years and older subjected to sexual violence by persons other than an intimate partner in the previous 12 months, by age and place of occurrence",
                "order" => "5.2.2",
                "level" => 2,
                "parent_indicator_id" => 103,
                "description" => null,
                "sdg_id" => 5
            ],
            [
                "id" => 114,
                "name" => "Proportion of women aged 20-24 years who were married or in a union before age 15 and before age 18",
                "order" => "5.3.1",
                "level" => 2,
                "parent_indicator_id" => 104,
                "description" => null,
                "sdg_id" => 5
            ],
            [
                "id" => 115,
                "name" => "Proportion of girls and women aged 15-49 years who have undergone female genital mutilation/cutting, by age",
                "order" => "5.3.2",
                "level" => 2,
                "parent_indicator_id" => 104,
                "description" => null,
                "sdg_id" => 5
            ],
            [
                "id" => 116,
                "name" => "Proportion of time spent on unpaid domestic and care work, by sex, age and location",
                "order" => "5.4.1",
                "level" => 2,
                "parent_indicator_id" => 105,
                "description" => null,
                "sdg_id" => 5
            ],
            [
                "id" => 117,
                "name" => "Proportion of seats held by women in national parliaments and local governments",
                "order" => "5.5.1",
                "level" => 2,
                "parent_indicator_id" => 106,
                "description" => null,
                "sdg_id" => 5
            ],
            [
                "id" => 118,
                "name" => "Proportion of women in managerial positions",
                "order" => "5.5.2",
                "level" => 2,
                "parent_indicator_id" => 106,
                "description" => null,
                "sdg_id" => 5
            ],
            [
                "id" => 119,
                "name" => "Proportion of women aged 15-49 years who make their own informed decisions regarding sexual relations, contraceptive use and reproductive health care",
                "order" => "5.6.1",
                "level" => 2,
                "parent_indicator_id" => 107,
                "description" => null,
                "sdg_id" => 5
            ],
            [
                "id" => 120,
                "name" => "Number of countries with laws and regulations that guarantee women aged 15-49 years access to sexual and reproductive health care, information and education",
                "order" => "5.6.2",
                "level" => 2,
                "parent_indicator_id" => 107,
                "description" => null,
                "sdg_id" => 5
            ],
            [
                "id" => 121,
                "name" => "(a) Proportion of total agricultural population with ownership or secure rights over agricultural land, by sex; and (b) share of women among owners or rights-bearers of agricultural land, by type of tenure",
                "order" => "5.a.1",
                "level" => 2,
                "parent_indicator_id" => 108,
                "description" => null,
                "sdg_id" => 5
            ],
            [
                "id" => 122,
                "name" => "Proportion of countries where the legal framework (including customary law) guarantees women s equal rights to land ownership and/or control",
                "order" => "5.a.2",
                "level" => 2,
                "parent_indicator_id" => 108,
                "description" => null,
                "sdg_id" => 5
            ],
            [
                "id" => 123,
                "name" => "Proportion of individuals who own a mobile telephone, by sex",
                "order" => "5.b.1",
                "level" => 2,
                "parent_indicator_id" => 109,
                "description" => null,
                "sdg_id" => 5
            ],
            [
                "id" => 124,
                "name" => "Proportion of countries with systems to track and make public allocations for gender equality and women s empowerment",
                "order" => "5.c.1",
                "level" => 2,
                "parent_indicator_id" => 110,
                "description" => null,
                "sdg_id" => 5
            ],
            [
                "id" => 125,
                "name" => "By 2030, achieve universal and equitable access to safe and affordable drinking water for all",
                "order" => "6.1",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 6
            ],
            [
                "id" => 126,
                "name" => "By 2030, achieve access to adequate and equitable sanitation and hygiene for all and end open defecation, paying special attention to the needs of women and girls and those in vulnerable situations",
                "order" => "6.2",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 6
            ],
            [
                "id" => 127,
                "name" => "By 2030, improve water quality by reducing pollution, eliminating dumping and minimizing release of hazardous chemicals and materials, halving the proportion of untreated wastewater and substantially increasing recycling and safe reuse globally",
                "order" => "6.3",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 6
            ],
            [
                "id" => 128,
                "name" => "By 2030, substantially increase water-use efficiency across all sectors and ensure sustainable withdrawals and supply of freshwater to address water scarcity and substantially reduce the number of people suffering from water scarcity",
                "order" => "6.4",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 6
            ],
            [
                "id" => 129,
                "name" => "By 2030, implement integrated water resources management at all levels, including through transboundary cooperation as appropriate",
                "order" => "6.5",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 6
            ],
            [
                "id" => 130,
                "name" => "By 2020, protect and restore water-related ecosystems, including mountains, forests, wetlands, rivers, aquifers and lakes",
                "order" => "6.6",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 6
            ],
            [
                "id" => 131,
                "name" => "By 2030, expand international cooperation and capacity-building support to developing countries in water- and sanitation-related activities and programmes, including water harvesting, desalination, water efficiency, wastewater treatment, recycling and reuse technologies",
                "order" => "6.a",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 6
            ],
            [
                "id" => 132,
                "name" => "Support and strengthen the participation of local communities in improving water and sanitation management",
                "order" => "6.b",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 6
            ],
            [
                "id" => 133,
                "name" => "Proportion of population using safely managed drinking water services",
                "order" => "6.1.1",
                "level" => 2,
                "parent_indicator_id" => 125,
                "description" => null,
                "sdg_id" => 6
            ],
            [
                "id" => 134,
                "name" => "Proportion of population using safely managed sanitation services, including a hand-washing facility with soap and water",
                "order" => "6.2.1",
                "level" => 2,
                "parent_indicator_id" => 126,
                "description" => null,
                "sdg_id" => 6
            ],
            [
                "id" => 135,
                "name" => "Proportion of wastewater safely treated",
                "order" => "6.3.1",
                "level" => 2,
                "parent_indicator_id" => 127,
                "description" => null,
                "sdg_id" => 6
            ],
            [
                "id" => 136,
                "name" => "Proportion of bodies of water with good ambient water quality",
                "order" => "6.3.2",
                "level" => 2,
                "parent_indicator_id" => 127,
                "description" => null,
                "sdg_id" => 6
            ],
            [
                "id" => 137,
                "name" => "Change in water-use efficiency over time",
                "order" => "6.4.1",
                "level" => 2,
                "parent_indicator_id" => 128,
                "description" => null,
                "sdg_id" => 6
            ],
            [
                "id" => 138,
                "name" => "Level of water stress: freshwater withdrawal as a proportion of available freshwater resources",
                "order" => "6.4.2",
                "level" => 2,
                "parent_indicator_id" => 128,
                "description" => null,
                "sdg_id" => 6
            ],
            [
                "id" => 139,
                "name" => "Degree of integrated water resources management implementation (0-100)",
                "order" => "6.5.1",
                "level" => 2,
                "parent_indicator_id" => 129,
                "description" => null,
                "sdg_id" => 6
            ],
            [
                "id" => 140,
                "name" => "Proportion of transboundary basin area with an operational arrangement for water cooperation",
                "order" => "6.5.2",
                "level" => 2,
                "parent_indicator_id" => 129,
                "description" => null,
                "sdg_id" => 6
            ],
            [
                "id" => 141,
                "name" => "Change in the extent of water-related ecosystems over time",
                "order" => "6.6.1",
                "level" => 2,
                "parent_indicator_id" => 130,
                "description" => null,
                "sdg_id" => 6
            ],
            [
                "id" => 142,
                "name" => "Amount of water- and sanitation-related official development assistance that is part of a government-coordinated spending plan",
                "order" => "6.a.1",
                "level" => 2,
                "parent_indicator_id" => 131,
                "description" => null,
                "sdg_id" => 6
            ],
            [
                "id" => 143,
                "name" => "Proportion of local administrative units with established and operational policies and procedures for participation of local communities in water and sanitation management",
                "order" => "6.b.1",
                "level" => 2,
                "parent_indicator_id" => 132,
                "description" => null,
                "sdg_id" => 6
            ],
            [
                "id" => 144,
                "name" => "By 2030, ensure universal access to affordable, reliable and modern energy services",
                "order" => "7.1",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 7
            ],
            [
                "id" => 145,
                "name" => "By 2030, increase substantially the share of renewable energy in the global energy mix",
                "order" => "7.2",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 7
            ],
            [
                "id" => 146,
                "name" => "By 2030, double the global rate of improvement in energy efficiency",
                "order" => "7.3",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 7
            ],
            [
                "id" => 147,
                "name" => "By 2030, enhance international cooperation to facilitate access to clean energy research and technology, including renewable energy, energy efficiency and advanced and cleaner fossil-fuel technology, and promote investment in energy infrastructure and clean energy technology",
                "order" => "7.a",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 7
            ],
            [
                "id" => 148,
                "name" => "By 2030, expand infrastructure and upgrade technology for supplying modern and sustainable energy services for all in developing countries, in particular least developed countries, small island developing States and landlocked developing countries, in accordance with their respective programmes of support",
                "order" => "7.b",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 7
            ],
            [
                "id" => 149,
                "name" => "Proportion of population with access to electricity",
                "order" => "7.1.1",
                "level" => 2,
                "parent_indicator_id" => 144,
                "description" => null,
                "sdg_id" => 7
            ],
            [
                "id" => 150,
                "name" => "Proportion of population with primary reliance on clean fuels and technology",
                "order" => "7.1.2",
                "level" => 2,
                "parent_indicator_id" => 144,
                "description" => null,
                "sdg_id" => 7
            ],
            [
                "id" => 151,
                "name" => "Renewable energy share in the total final energy consumption",
                "order" => "7.2.1",
                "level" => 2,
                "parent_indicator_id" => 145,
                "description" => null,
                "sdg_id" => 7
            ],
            [
                "id" => 152,
                "name" => "Energy intensity measured in terms of primary energy and GDP",
                "order" => "7.3.1",
                "level" => 2,
                "parent_indicator_id" => 146,
                "description" => null,
                "sdg_id" => 7
            ],
            [
                "id" => 153,
                "name" => "Mobilized amount of United States dollars per year starting in 2020 accountable towards the $100 billion commitment",
                "order" => "7.a.1",
                "level" => 2,
                "parent_indicator_id" => 147,
                "description" => null,
                "sdg_id" => 7
            ],
            [
                "id" => 154,
                "name" => "Investments in energy efficiency as a percentage of GDP and the amount of foreign direct investment in financial transfer for infrastructure and technology to sustainable development services",
                "order" => "7.b.1",
                "level" => 2,
                "parent_indicator_id" => 148,
                "description" => null,
                "sdg_id" => 7
            ],
            [
                "id" => 155,
                "name" => "Sustain per capita economic growth in accordance with national circumstances and, in particular, at least 7 per cent gross domestic product growth per annum in the least developed countries",
                "order" => "8.1",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 8
            ],
            [
                "id" => 156,
                "name" => "Achieve higher levels of economic productivity through diversification, technological upgrading and innovation, including through a focus on high-value added and labour-intensive sectors",
                "order" => "8.2",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 8
            ],
            [
                "id" => 157,
                "name" => "Promote development-oriented policies that support productive activities, decent job creation, entrepreneurship, creativity and innovation, and encourage the formalization and growth of micro-, small- and medium-sized enterprises, including through access to financial services",
                "order" => "8.3",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 8
            ],
            [
                "id" => 158,
                "name" => "Improve progressively, through 2030, global resource efficiency in consumption and production and endeavour to decouple economic growth from environmental degradation, in accordance with the 10-Year Framework of Programmes on Sustainable Consumption and Production, with developed countries taking the lead",
                "order" => "8.4",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 8
            ],
            [
                "id" => 159,
                "name" => "By 2030, achieve full and productive employment and decent work for all women and men, including for young people and persons with disabilities, and equal pay for work of equal value",
                "order" => "8.5",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 8
            ],
            [
                "id" => 160,
                "name" => "By 2020, substantially reduce the proportion of youth not in employment, education or training",
                "order" => "8.6",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 8
            ],
            [
                "id" => 161,
                "name" => "Take immediate and effective measures to eradicate forced labour, end modern slavery and human trafficking and secure the prohibition and elimination of the worst forms of child labour, including recruitment and use of child soldiers, and by 2025 end child labour in all its forms",
                "order" => "8.7",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 8
            ],
            [
                "id" => 162,
                "name" => "Protect labour rights and promote safe and secure working environments for all workers, including migrant workers, in particular women migrants, and those in precarious employment",
                "order" => "8.8",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 8
            ],
            [
                "id" => 163,
                "name" => "By 2030, devise and implement policies to promote sustainable tourism that creates jobs and promotes local culture and products",
                "order" => "8.9",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 8
            ],
            [
                "id" => 164,
                "name" => "Strengthen the capacity of domestic financial institutions to encourage and expand access to banking, insurance and financial services for all",
                "order" => "8.10",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 8
            ],
            [
                "id" => 165,
                "name" => "Increase Aid for Trade support for developing countries, in particular least developed countries, including through the Enhanced Integrated Framework for Trade-related Technical Assistance to Least Developed Countries",
                "order" => "8.a",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 8
            ],
            [
                "id" => 166,
                "name" => "By 2020, develop and operationalize a global strategy for youth employment and implement the Global Jobs Pact of the International Labour Organization",
                "order" => "8.b",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 8
            ],
            [
                "id" => 167,
                "name" => "Annual growth rate of real GDP per capita",
                "order" => "8.1.1",
                "level" => 2,
                "parent_indicator_id" => 155,
                "description" => null,
                "sdg_id" => 8
            ],
            [
                "id" => 168,
                "name" => "Annual growth rate of real GDP per employed person",
                "order" => "8.2.1",
                "level" => 2,
                "parent_indicator_id" => 156,
                "description" => null,
                "sdg_id" => 8
            ],
            [
                "id" => 169,
                "name" => "Proportion of informal employment in non-agriculture employment, by sex",
                "order" => "8.3.1",
                "level" => 2,
                "parent_indicator_id" => 157,
                "description" => null,
                "sdg_id" => 8
            ],
            [
                "id" => 170,
                "name" => "Material footprint, material footprint per capita, and material footprint per GDP",
                "order" => "8.4.1",
                "level" => 2,
                "parent_indicator_id" => 158,
                "description" => null,
                "sdg_id" => 8
            ],
            [
                "id" => 171,
                "name" => "Domestic material consumption, domestic material consumption per capita, and domestic material consumption per GDP",
                "order" => "8.4.2",
                "level" => 2,
                "parent_indicator_id" => 158,
                "description" => null,
                "sdg_id" => 8
            ],
            [
                "id" => 172,
                "name" => "Average hourly earnings of female and male employees, by occupation, age and persons with disabilities",
                "order" => "8.5.1",
                "level" => 2,
                "parent_indicator_id" => 159,
                "description" => null,
                "sdg_id" => 8
            ],
            [
                "id" => 173,
                "name" => "Unemployment rate, by sex, age and persons with disabilities",
                "order" => "8.5.2",
                "level" => 2,
                "parent_indicator_id" => 159,
                "description" => null,
                "sdg_id" => 8
            ],
            [
                "id" => 174,
                "name" => "Proportion of youth (aged 15-24 years) not in education, employment or training",
                "order" => "8.6.1",
                "level" => 2,
                "parent_indicator_id" => 160,
                "description" => null,
                "sdg_id" => 8
            ],
            [
                "id" => 175,
                "name" => "Proportion and number of children aged 5-17 years engaged in child labour, by sex and age",
                "order" => "8.7.1",
                "level" => 2,
                "parent_indicator_id" => 161,
                "description" => null,
                "sdg_id" => 8
            ],
            [
                "id" => 176,
                "name" => "Frequency rates of fatal and non-fatal occupational injuries, by sex and migrant status",
                "order" => "8.8.1",
                "level" => 2,
                "parent_indicator_id" => 162,
                "description" => null,
                "sdg_id" => 8
            ],
            [
                "id" => 177,
                "name" => "Increase in national compliance of labour rights (freedom of association and collective bargaining) based on International Labour Organization (ILO) textual sources and national legislation, by sex and migrant status",
                "order" => "8.8.2",
                "level" => 2,
                "parent_indicator_id" => 162,
                "description" => null,
                "sdg_id" => 8
            ],
            [
                "id" => 178,
                "name" => "Tourism direct GDP as a proportion of total GDP and in growth rate",
                "order" => "8.9.1",
                "level" => 2,
                "parent_indicator_id" => 163,
                "description" => null,
                "sdg_id" => 8
            ],
            [
                "id" => 179,
                "name" => "Number of jobs in tourism industries as a proportion of total jobs and growth rate of jobs, by sex",
                "order" => "8.9.2",
                "level" => 2,
                "parent_indicator_id" => 163,
                "description" => null,
                "sdg_id" => 8
            ],
            [
                "id" => 180,
                "name" => "Number of commercial bank branches and automated teller machines (ATMs) per 100,000 adults",
                "order" => "8.10.1",
                "level" => 2,
                "parent_indicator_id" => 164,
                "description" => null,
                "sdg_id" => 8
            ],
            [
                "id" => 181,
                "name" => "Proportion of adults (15 years and older) with an account at a bank or other financial institution or with a mobile-money-service provider",
                "order" => "8.10.2",
                "level" => 2,
                "parent_indicator_id" => 164,
                "description" => null,
                "sdg_id" => 8
            ],
            [
                "id" => 182,
                "name" => "Aid for Trade commitments and disbursements",
                "order" => "8.a.1",
                "level" => 2,
                "parent_indicator_id" => 165,
                "description" => null,
                "sdg_id" => 8
            ],
            [
                "id" => 183,
                "name" => "Total government spending in social protection and employment programmes as a proportion of the national budgets and GDP",
                "order" => "8.b.1",
                "level" => 2,
                "parent_indicator_id" => 166,
                "description" => null,
                "sdg_id" => 8
            ],
            [
                "id" => 184,
                "name" => "Develop quality, reliable, sustainable and resilient infrastructure, including regional and trans-border infrastructure, to support economic development and human well-being, with a focus on affordable and equitable access for all",
                "order" => "9.1",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 9
            ],
            [
                "id" => 185,
                "name" => "Promote inclusive and sustainable industrialization and, by 2030, significantly raise industry s share of employment and gross domestic product, in line with national circumstances, and double its share in least developed countries",
                "order" => "9.2",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 9
            ],
            [
                "id" => 186,
                "name" => "Increase the access of small-scale industrial and other enterprises, in particular in developing countries, to financial services, including affordable credit, and their integration into value chains and markets",
                "order" => "9.3",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 9
            ],
            [
                "id" => 187,
                "name" => "By 2030, upgrade infrastructure and retrofit industries to make them sustainable, with increased resource-use efficiency and greater adoption of clean and environmentally sound technologies and industrial processes, with all countries taking action in accordance with their respective capabilities",
                "order" => "9.4",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 9
            ],
            [
                "id" => 188,
                "name" => "Enhance scientific research, upgrade the technological capabilities of industrial sectors in all countries, in particular developing countries, including, by 2030, encouraging innovation and substantially increasing the number of research and development workers per 1 million people and public and private research and development spending",
                "order" => "9.5",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 9
            ],
            [
                "id" => 189,
                "name" => "Facilitate sustainable and resilient infrastructure development in developing countries through enhanced financial, technological and technical support to African countries, least developed countries, landlocked developing countries and small island developing States",
                "order" => "9.a",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 9
            ],
            [
                "id" => 190,
                "name" => "Support domestic technology development, research and innovation in developing countries, including by ensuring a conducive policy environment for, inter alia, industrial diversification and value addition to commodities",
                "order" => "9.b",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 9
            ],
            [
                "id" => 191,
                "name" => "Significantly increase access to information and communications technology and strive to provide universal and affordable access to the Internet in least developed countries by 2020",
                "order" => "9.c",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 9
            ],
            [
                "id" => 192,
                "name" => "Proportion of the rural population who live within 2 km of an all-season road",
                "order" => "9.1.1",
                "level" => 2,
                "parent_indicator_id" => 184,
                "description" => null,
                "sdg_id" => 9
            ],
            [
                "id" => 193,
                "name" => "Passenger and freight volumes, by mode of transport",
                "order" => "9.1.2",
                "level" => 2,
                "parent_indicator_id" => 184,
                "description" => null,
                "sdg_id" => 9
            ],
            [
                "id" => 194,
                "name" => "Manufacturing value added as a proportion of GDP and per capita",
                "order" => "9.2.1",
                "level" => 2,
                "parent_indicator_id" => 185,
                "description" => null,
                "sdg_id" => 9
            ],
            [
                "id" => 195,
                "name" => "Manufacturing employment as a proportion of total employment",
                "order" => "9.2.2",
                "level" => 2,
                "parent_indicator_id" => 185,
                "description" => null,
                "sdg_id" => 9
            ],
            [
                "id" => 196,
                "name" => "Proportion of small-scale industries in total industry value added",
                "order" => "9.3.1",
                "level" => 2,
                "parent_indicator_id" => 186,
                "description" => null,
                "sdg_id" => 9
            ],
            [
                "id" => 197,
                "name" => "Proportion of small-scale industries with a loan or line of credit",
                "order" => "9.3.2",
                "level" => 2,
                "parent_indicator_id" => 186,
                "description" => null,
                "sdg_id" => 9
            ],
            [
                "id" => 198,
                "name" => "CO2 emission per unit of value added",
                "order" => "9.4.1",
                "level" => 2,
                "parent_indicator_id" => 187,
                "description" => null,
                "sdg_id" => 9
            ],
            [
                "id" => 199,
                "name" => "Research and development expenditure as a proportion of GDP",
                "order" => "9.5.1",
                "level" => 2,
                "parent_indicator_id" => 188,
                "description" => null,
                "sdg_id" => 9
            ],
            [
                "id" => 200,
                "name" => "Researchers (in full-time equivalent) per million inhabitants",
                "order" => "9.5.2",
                "level" => 2,
                "parent_indicator_id" => 188,
                "description" => null,
                "sdg_id" => 9
            ],
            [
                "id" => 201,
                "name" => "Total official international support (official development assistance plus other official flows) to infrastructure",
                "order" => "9.a.1",
                "level" => 2,
                "parent_indicator_id" => 189,
                "description" => null,
                "sdg_id" => 9
            ],
            [
                "id" => 202,
                "name" => "Proportion of medium and high-tech industry value added in total value added",
                "order" => "9.b.1",
                "level" => 2,
                "parent_indicator_id" => 190,
                "description" => null,
                "sdg_id" => 9
            ],
            [
                "id" => 203,
                "name" => "Proportion of population covered by a mobile network, by technology",
                "order" => "9.c.1",
                "level" => 2,
                "parent_indicator_id" => 191,
                "description" => null,
                "sdg_id" => 9
            ],
            [
                "id" => 204,
                "name" => "By 2030, progressively achieve and sustain income growth of the bottom 40 per cent of the population at a rate higher than the national average",
                "order" => "10.1",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 10
            ],
            [
                "id" => 205,
                "name" => "By 2030, empower and promote the social, economic and political inclusion of all, irrespective of age, sex, disability, race, ethnicity, origin, religion or economic or other status",
                "order" => "10.2",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 10
            ],
            [
                "id" => 206,
                "name" => "Ensure equal opportunity and reduce inequalities of outcome, including by eliminating discriminatory laws, policies and practices and promoting appropriate legislation, policies and action in this regard",
                "order" => "10.3",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 10
            ],
            [
                "id" => 207,
                "name" => "Adopt policies, especially fiscal, wage and social protection policies, and progressively achieve greater equality",
                "order" => "10.4",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 10
            ],
            [
                "id" => 208,
                "name" => "Improve the regulation and monitoring of global financial markets and institutions and strengthen the implementation of such regulations",
                "order" => "10.5",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 10
            ],
            [
                "id" => 209,
                "name" => "Ensure enhanced representation and voice for developing countries in decision-making in global international economic and financial institutions in order to deliver more effective, credible, accountable and legitimate institutions",
                "order" => "10.6",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 10
            ],
            [
                "id" => 210,
                "name" => "Facilitate orderly, safe, regular and responsible migration and mobility of people, including through the implementation of planned and well-managed migration policies",
                "order" => "10.7",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 10
            ],
            [
                "id" => 211,
                "name" => "Implement the principle of special and differential treatment for developing countries, in particular least developed countries, in accordance with World Trade Organization agreements",
                "order" => "10.a",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 10
            ],
            [
                "id" => 212,
                "name" => "Encourage official development assistance and financial flows, including foreign direct investment, to States where the need is greatest, in particular least developed countries, African countries, small island developing States and landlocked developing countries, in accordance with their national plans and programmes",
                "order" => "10.b",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 10
            ],
            [
                "id" => 213,
                "name" => "By 2030, reduce to less than 3 per cent the transaction costs of migrant remittances and eliminate remittance corridors with costs higher than 5 per cent",
                "order" => "10.c",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 10
            ],
            [
                "id" => 214,
                "name" => "Growth rates of household expenditure or income per capita among the bottom 40 per cent of the population and the total population",
                "order" => "10.1.1",
                "level" => 2,
                "parent_indicator_id" => 204,
                "description" => null,
                "sdg_id" => 10
            ],
            [
                "id" => 215,
                "name" => "Proportion of people living below 50 per cent of median income, by age, sex and persons with disabilities",
                "order" => "10.2.1",
                "level" => 2,
                "parent_indicator_id" => 205,
                "description" => null,
                "sdg_id" => 10
            ],
            [
                "id" => 216,
                "name" => "Proportion of the population reporting having personally felt discriminated against or harassed within the previous 12 months on the basis of a ground of discrimination prohibited under international human rights law",
                "order" => "10.3.1",
                "level" => 2,
                "parent_indicator_id" => 206,
                "description" => null,
                "sdg_id" => 10
            ],
            [
                "id" => 217,
                "name" => "Labour share of GDP, comprising wages and social protection transfers",
                "order" => "10.4.1",
                "level" => 2,
                "parent_indicator_id" => 207,
                "description" => null,
                "sdg_id" => 10
            ],
            [
                "id" => 218,
                "name" => "Financial Soundness Indicators",
                "order" => "10.5.1",
                "level" => 2,
                "parent_indicator_id" => 208,
                "description" => null,
                "sdg_id" => 10
            ],
            [
                "id" => 219,
                "name" => "Proportion of members and voting rights of developing countries in international organizations",
                "order" => "10.6.1",
                "level" => 2,
                "parent_indicator_id" => 209,
                "description" => null,
                "sdg_id" => 10
            ],
            [
                "id" => 220,
                "name" => "Recruitment cost borne by employee as a proportion of yearly income earned in country of destination",
                "order" => "10.7.1",
                "level" => 2,
                "parent_indicator_id" => 210,
                "description" => null,
                "sdg_id" => 10
            ],
            [
                "id" => 221,
                "name" => "Number of countries that have implemented well-managed migration policies",
                "order" => "10.7.2",
                "level" => 2,
                "parent_indicator_id" => 210,
                "description" => null,
                "sdg_id" => 10
            ],
            [
                "id" => 222,
                "name" => "Proportion of tariff lines applied to imports from least developed countries and developing countries with zero-tariff",
                "order" => "10.a.1",
                "level" => 2,
                "parent_indicator_id" => 211,
                "description" => null,
                "sdg_id" => 10
            ],
            [
                "id" => 223,
                "name" => "Total resource flows for development, by recipient and donor countries and type of flow (e.g. official development assistance, foreign direct investment and other flows)",
                "order" => "10.b.1",
                "level" => 2,
                "parent_indicator_id" => 212,
                "description" => null,
                "sdg_id" => 10
            ],
            [
                "id" => 224,
                "name" => "Remittance costs as a proportion of the amount remitted",
                "order" => "10.c.1",
                "level" => 2,
                "parent_indicator_id" => 213,
                "description" => null,
                "sdg_id" => 10
            ],
            [
                "id" => 225,
                "name" => "By 2030, ensure access for all to adequate, safe and affordable housing and basic services and upgrade slums",
                "order" => "11.1",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 11
            ],
            [
                "id" => 226,
                "name" => "By 2030, provide access to safe, affordable, accessible and sustainable transport systems for all, improving road safety, notably by expanding public transport, with special attention to the needs of those in vulnerable situations, women, children, persons with disabilities and older persons",
                "order" => "11.2",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 11
            ],
            [
                "id" => 227,
                "name" => "By 2030, enhance inclusive and sustainable urbanization and capacity for participatory, integrated and sustainable human settlement planning and management in all countries",
                "order" => "11.3",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 11
            ],
            [
                "id" => 228,
                "name" => "Strengthen efforts to protect and safeguard the world s cultural and natural heritage",
                "order" => "11.4",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 11
            ],
            [
                "id" => 229,
                "name" => "By 2030, significantly reduce the number of deaths and the number of people affected and substantially decrease the direct economic losses relative to global gross domestic product caused by disasters, including water-related disasters, with a focus on protecting the poor and people in vulnerable situations",
                "order" => "11.5",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 11
            ],
            [
                "id" => 230,
                "name" => "By 2030, reduce the adverse per capita environmental impact of cities, including by paying special attention to air quality and municipal and other waste management",
                "order" => "11.6",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 11
            ],
            [
                "id" => 231,
                "name" => "By 2030, provide universal access to safe, inclusive and accessible, green and public spaces, in particular for women and children, older persons and persons with disabilities",
                "order" => "11.7",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 11
            ],
            [
                "id" => 232,
                "name" => "Support positive economic, social and environmental links between urban, peri-urban and rural areas by strengthening national and regional development planning",
                "order" => "11.a",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 11
            ],
            [
                "id" => 233,
                "name" => "By 2020, substantially increase the number of cities and human settlements adopting and implementing integrated policies and plans towards inclusion, resource efficiency, mitigation and adaptation to climate change, resilience to disasters, and develop and implement, in line with the Sendai Framework for Disaster Risk Reduction 2015-2030, holistic disaster risk management at all levels",
                "order" => "11.b",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 11
            ],
            [
                "id" => 234,
                "name" => "Support least developed countries, including through financial and technical assistance, in building sustainable and resilient buildings utilizing local materials",
                "order" => "11.c",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 11
            ],
            [
                "id" => 235,
                "name" => "Proportion of urban population living in slums, informal settlements or inadequate housing",
                "order" => "11.1.1",
                "level" => 2,
                "parent_indicator_id" => 225,
                "description" => null,
                "sdg_id" => 11
            ],
            [
                "id" => 236,
                "name" => "Proportion of population that has convenient access to public transport, by sex, age and persons with disabilities",
                "order" => "11.2.1",
                "level" => 2,
                "parent_indicator_id" => 226,
                "description" => null,
                "sdg_id" => 11
            ],
            [
                "id" => 237,
                "name" => "Ratio of land consumption rate to population growth rate",
                "order" => "11.3.1",
                "level" => 2,
                "parent_indicator_id" => 227,
                "description" => null,
                "sdg_id" => 11
            ],
            [
                "id" => 238,
                "name" => "Proportion of cities with a direct participation structure of civil society in urban planning and management that operate regularly and democratically",
                "order" => "11.3.2",
                "level" => 2,
                "parent_indicator_id" => 227,
                "description" => null,
                "sdg_id" => 11
            ],
            [
                "id" => 239,
                "name" => "Total expenditure (public and private) per capita spent on the preservation, protection and conservation of all cultural and natural heritage, by type of heritage (cultural, natural, mixed and World Heritage Centre designation), level of government (national, regional and local/municipal), type of expenditure (operating expenditure/investment) and type of private funding (donations in kind, private non-profit sector and sponsorship)",
                "order" => "11.4.1",
                "level" => 2,
                "parent_indicator_id" => 228,
                "description" => null,
                "sdg_id" => 11
            ],
            [
                "id" => 240,
                "name" => "Number of deaths, missing persons and persons affected by disaster per 100,000 people",
                "order" => "11.5.1",
                "level" => 2,
                "parent_indicator_id" => 229,
                "description" => null,
                "sdg_id" => 11
            ],
            [
                "id" => 241,
                "name" => "Direct disaster economic loss in relation to global GDP, including disaster damage to critical infrastructure and disruption of basic services",
                "order" => "11.5.2",
                "level" => 2,
                "parent_indicator_id" => 229,
                "description" => null,
                "sdg_id" => 11
            ],
            [
                "id" => 242,
                "name" => "Proportion of urban solid waste regularly collected and with adequate final discharge out of total urban solid waste generated, by cities",
                "order" => "11.6.1",
                "level" => 2,
                "parent_indicator_id" => 230,
                "description" => null,
                "sdg_id" => 11
            ],
            [
                "id" => 243,
                "name" => "Annual mean levels of fine particulate matter (e.g. PM2.5 and PM10) in cities (population weighted)",
                "order" => "11.6.2",
                "level" => 2,
                "parent_indicator_id" => 230,
                "description" => null,
                "sdg_id" => 11
            ],
            [
                "id" => 244,
                "name" => "Average share of the built-up area of cities that is open space for public use for all, by sex, age and persons with disabilities",
                "order" => "11.7.1",
                "level" => 2,
                "parent_indicator_id" => 231,
                "description" => null,
                "sdg_id" => 11
            ],
            [
                "id" => 245,
                "name" => "Proportion of persons victim of physical or sexual harassment, by sex, age, disability status and place of occurrence, in the previous 12 months",
                "order" => "11.7.2",
                "level" => 2,
                "parent_indicator_id" => 231,
                "description" => null,
                "sdg_id" => 11
            ],
            [
                "id" => 246,
                "name" => "Proportion of population living in cities that implement urban and regional development plans integrating population projections and resource needs, by size of city",
                "order" => "11.a.1",
                "level" => 2,
                "parent_indicator_id" => 232,
                "description" => null,
                "sdg_id" => 11
            ],
            [
                "id" => 247,
                "name" => "Proportion of local governments that adopt and implement local disaster risk reduction strategies in line with the Sendai Framework for Disaster Risk Reduction 2015-2030",
                "order" => "11.b.1",
                "level" => 2,
                "parent_indicator_id" => 233,
                "description" => null,
                "sdg_id" => 11
            ],
            [
                "id" => 248,
                "name" => "Number of countries with national and local disaster risk reduction strategies",
                "order" => "11.b.2",
                "level" => 2,
                "parent_indicator_id" => 233,
                "description" => null,
                "sdg_id" => 11
            ],
            [
                "id" => 249,
                "name" => "Proportion of financial support to the least developed countries that is allocated to the construction and retrofitting of sustainable, resilient and resource-efficient buildings utilizing local materials",
                "order" => "11.c.1",
                "level" => 2,
                "parent_indicator_id" => 234,
                "description" => null,
                "sdg_id" => 11
            ],
            [
                "id" => 250,
                "name" => "Implement the 10-Year Framework of Programmes on Sustainable Consumption and Production Patterns, all countries taking action, with developed countries taking the lead, taking into account the development and capabilities of developing countries",
                "order" => "12.1",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 12
            ],
            [
                "id" => 251,
                "name" => "By 2030, achieve the sustainable management and efficient use of natural resources",
                "order" => "12.2",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 12
            ],
            [
                "id" => 252,
                "name" => "By 2030, halve per capita global food waste at the retail and consumer levels and reduce food losses along production and supply chains, including post-harvest losses",
                "order" => "12.3",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 12
            ],
            [
                "id" => 253,
                "name" => "By 2020, achieve the environmentally sound management of chemicals and all wastes throughout their life cycle, in accordance with agreed international frameworks, and significantly reduce their release to air, water and soil in order to minimize their adverse impacts on human health and the environment",
                "order" => "12.4",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 12
            ],
            [
                "id" => 254,
                "name" => "By 2030, substantially reduce waste generation through prevention, reduction, recycling and reuse",
                "order" => "12.5",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 12
            ],
            [
                "id" => 255,
                "name" => "Encourage companies, especially large and transnational companies, to adopt sustainable practices and to integrate sustainability information into their reporting cycle",
                "order" => "12.6",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 12
            ],
            [
                "id" => 256,
                "name" => "Promote public procurement practices that are sustainable, in accordance with national policies and priorities",
                "order" => "12.7",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 12
            ],
            [
                "id" => 257,
                "name" => "By 2030, ensure that people everywhere have the relevant information and awareness for sustainable development and lifestyles in harmony with nature",
                "order" => "12.8",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 12
            ],
            [
                "id" => 258,
                "name" => "Support developing countries to strengthen their scientific and technological capacity to move towards more sustainable patterns of consumption and production",
                "order" => "12.a",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 12
            ],
            [
                "id" => 259,
                "name" => "Develop and implement tools to monitor sustainable development impacts for sustainable tourism that creates jobs and promotes local culture and products",
                "order" => "12.b",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 12
            ],
            [
                "id" => 260,
                "name" => "Rationalize inefficient fossil-fuel subsidies that encourage wasteful consumption by removing market distortions, in accordance with national circumstances, including by restructuring taxation and phasing out those harmful subsidies, where they exist, to reflect their environmental impacts, taking fully into account the specific needs and conditions of developing countries and minimizing the possible adverse impacts on their development in a manner that protects the poor and the affected communities",
                "order" => "12.c",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 12
            ],
            [
                "id" => 261,
                "name" => "Number of countries with sustainable consumption and production (SCP) national action plans or SCP mainstreamed as a priority or a target into national policies",
                "order" => "12.1.1",
                "level" => 2,
                "parent_indicator_id" => 250,
                "description" => null,
                "sdg_id" => 12
            ],
            [
                "id" => 262,
                "name" => "Material footprint, material footprint per capita, and material footprint per GDP",
                "order" => "12.2.1",
                "level" => 2,
                "parent_indicator_id" => 251,
                "description" => null,
                "sdg_id" => 12
            ],
            [
                "id" => 263,
                "name" => "Global food loss index",
                "order" => "12.3.1",
                "level" => 2,
                "parent_indicator_id" => 252,
                "description" => null,
                "sdg_id" => 12
            ],
            [
                "id" => 264,
                "name" => "Number of parties to international multilateral environmental agreements on hazardous waste, and other chemicals that meet their commitments and obligations in transmitting information as required by each relevant agreement",
                "order" => "12.4.1",
                "level" => 2,
                "parent_indicator_id" => 253,
                "description" => null,
                "sdg_id" => 12
            ],
            [
                "id" => 265,
                "name" => "Hazardous waste generated per capita and proportion of hazardous waste treated, by type of treatment",
                "order" => "12.4.2",
                "level" => 2,
                "parent_indicator_id" => 253,
                "description" => null,
                "sdg_id" => 12
            ],
            [
                "id" => 266,
                "name" => "National recycling rate, tons of material recycled",
                "order" => "12.5.1",
                "level" => 2,
                "parent_indicator_id" => 254,
                "description" => null,
                "sdg_id" => 12
            ],
            [
                "id" => 267,
                "name" => "Number of companies publishing sustainability reports",
                "order" => "12.6.1",
                "level" => 2,
                "parent_indicator_id" => 255,
                "description" => null,
                "sdg_id" => 12
            ],
            [
                "id" => 268,
                "name" => "Number of countries implementing sustainable public procurement policies and action plans",
                "order" => "12.7.1",
                "level" => 2,
                "parent_indicator_id" => 256,
                "description" => null,
                "sdg_id" => 12
            ],
            [
                "id" => 269,
                "name" => "Extent to which (i) global citizenship education and (ii) education for sustainable development (including climate change education) are mainstreamed in (a) national education policies; (b) curricula; (c) teacher education; and (d) student assessment",
                "order" => "12.8.1",
                "level" => 2,
                "parent_indicator_id" => 257,
                "description" => null,
                "sdg_id" => 12
            ],
            [
                "id" => 270,
                "name" => "Amount of support to developing countries on research and development for sustainable consumption and production and environmentally sound technologies",
                "order" => "12.a.1",
                "level" => 2,
                "parent_indicator_id" => 258,
                "description" => null,
                "sdg_id" => 12
            ],
            [
                "id" => 271,
                "name" => "Number of sustainable tourism strategies or policies and implemented action plans with agreed monitoring and evaluation tools",
                "order" => "12.b.1",
                "level" => 2,
                "parent_indicator_id" => 259,
                "description" => null,
                "sdg_id" => 12
            ],
            [
                "id" => 272,
                "name" => "Amount of fossil-fuel subsidies per unit of GDP (production and consumption) and as a proportion of total national expenditure on fossil fuels",
                "order" => "12.c.1",
                "level" => 2,
                "parent_indicator_id" => 260,
                "description" => null,
                "sdg_id" => 12
            ],
            [
                "id" => 273,
                "name" => "Strengthen resilience and adaptive capacity to climate-related hazards and natural disasters in all countries",
                "order" => "13.1",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 13
            ],
            [
                "id" => 274,
                "name" => "Integrate climate change measures into national policies, strategies and planning",
                "order" => "13.2",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 13
            ],
            [
                "id" => 275,
                "name" => "Improve education, awareness-raising and human and institutional capacity on climate change mitigation, adaptation, impact reduction and early warning",
                "order" => "13.3",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 13
            ],
            [
                "id" => 276,
                "name" => "Implement the commitment undertaken by developed-country parties to the United Nations Framework Convention on Climate Change to a goal of mobilizing jointly $100 billion annually by 2020 from all sources to address the needs of developing countries in the context of meaningful mitigation actions and transparency on implementation and fully operationalize the Green Climate Fund through its capitalization as soon as possible",
                "order" => "13.a",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 13
            ],
            [
                "id" => 277,
                "name" => "Promote mechanisms for raising capacity for effective climate change-related planning and management in least developed countries and small island developing States, including focusing on women, youth and local and marginalized communities",
                "order" => "13.b",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 13
            ],
            [
                "id" => 278,
                "name" => "Number of countries with national and local disaster risk reduction strategies",
                "order" => "13.1.1",
                "level" => 2,
                "parent_indicator_id" => 273,
                "description" => null,
                "sdg_id" => 13
            ],
            [
                "id" => 279,
                "name" => "Number of deaths, missing persons and persons affected by disaster per 100,000 people",
                "order" => "13.1.2",
                "level" => 2,
                "parent_indicator_id" => 273,
                "description" => null,
                "sdg_id" => 13
            ],
            [
                "id" => 280,
                "name" => "Number of countries that have communicated the establishment or operationalization of an integrated policy/strategy/plan which increases their ability to adapt to the adverse impacts of climate change, and foster climate resilience and low greenhouse gas emissions development in a manner that does not threaten food production (including a national adaptation plan, nationally determined contribution, national communication, biennial update report or other)",
                "order" => "13.2.1",
                "level" => 2,
                "parent_indicator_id" => 274,
                "description" => null,
                "sdg_id" => 13
            ],
            [
                "id" => 281,
                "name" => "Number of countries that have integrated mitigation, adaptation, impact reduction and early warning into primary, secondary and tertiary curricula",
                "order" => "13.3.1",
                "level" => 2,
                "parent_indicator_id" => 275,
                "description" => null,
                "sdg_id" => 13
            ],
            [
                "id" => 282,
                "name" => "Number of countries that have communicated the strengthening of institutional, systemic and individual capacity-building to implement adaptation, mitigation and technology transfer, and development actions",
                "order" => "13.3.2",
                "level" => 2,
                "parent_indicator_id" => 275,
                "description" => null,
                "sdg_id" => 13
            ],
            [
                "id" => 283,
                "name" => "Mobilized amount of United States dollars per year starting in 2020 accountable towards the $100 billion commitment",
                "order" => "13.a.1",
                "level" => 2,
                "parent_indicator_id" => 276,
                "description" => null,
                "sdg_id" => 13
            ],
            [
                "id" => 284,
                "name" => "Number of least developed countries and small island developing States that are receiving specialized support, and amount of support, including finance, technology and capacity-building, for mechanisms for raising capacities for effective climate change-related planning and management, including focusing on women, youth and local and marginalized communities",
                "order" => "13.b.1",
                "level" => 2,
                "parent_indicator_id" => 277,
                "description" => null,
                "sdg_id" => 13
            ],
            [
                "id" => 285,
                "name" => "Prevent and significantly reduce marine pollution of all kinds, in particular from land-based activities, including marine debris and nutrient pollution",
                "order" => "14.1",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 14
            ],
            [
                "id" => 286,
                "name" => "Sustainably manage and protect marine and coastal ecosystems to avoid significant adverse impacts, including by strengthening their resilience, and take action for their restoration in order to achieve healthy and productive oceans",
                "order" => "14.2",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 14
            ],
            [
                "id" => 287,
                "name" => "Minimize and address the impacts of ocean acidification, including through enhanced scientific cooperation at all levels",
                "order" => "14.3",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 14
            ],
            [
                "id" => 288,
                "name" => "Effectively regulate harvesting and end overfishing, illegal, unreported and unregulated fishing and destructive fishing practices and implement science-based management plans, in order to restore fish stocks in the shortest time feasible, at least to levels that can produce maximum sustainable yield as determined by their biological characteristics",
                "order" => "14.4",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 14
            ],
            [
                "id" => 289,
                "name" => "Conserve at least 10 per cent of coastal and marine areas, consistent with national and international law and based on the best available scientific information",
                "order" => "14.5",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 14
            ],
            [
                "id" => 290,
                "name" => "Prohibit certain forms of fisheries subsidies which contribute to overcapacity and overfishing, eliminate subsidies that contribute to illegal, unreported and unregulated fishing and refrain from introducing new such subsidies, recognizing that appropriate and effective special and differential treatment for developing and least developed countries should be an integral part of the World Trade Organization fisheries subsidies negotiation",
                "order" => "14.6",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 14
            ],
            [
                "id" => 291,
                "name" => "Increase the economic benefits to small island developing States and least developed countries from the sustainable use of marine resources, including through sustainable management of fisheries, aquaculture and tourism",
                "order" => "14.7",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 14
            ],
            [
                "id" => 292,
                "name" => "Increase scientific knowledge, develop research capacity and transfer marine technology, taking into account the Intergovernmental Oceanographic Commission Criteria and Guidelines on the Transfer of Marine Technology, in order to improve ocean health and to enhance the contribution of marine biodiversity to the development of developing countries, in particular small island developing States and least developed countries",
                "order" => "14.a",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 14
            ],
            [
                "id" => 293,
                "name" => "Provide access for small-scale artisanal fishers to marine resources and markets",
                "order" => "14.b",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 14
            ],
            [
                "id" => 294,
                "name" => "Enhance the conservation and sustainable use of oceans and their resources by implementing international law as reflected in the United Nations Convention on the Law of the Sea, which provides the legal framework for the conservation and sustainable use of oceans and their resources, as recalled in paragraph 158 of  The future we want ",
                "order" => "14.c",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 14
            ],
            [
                "id" => 295,
                "name" => "Index of coastal eutrophication and floating plastic debris density",
                "order" => "14.1.1",
                "level" => 2,
                "parent_indicator_id" => 285,
                "description" => null,
                "sdg_id" => 14
            ],
            [
                "id" => 296,
                "name" => "Proportion of national exclusive economic zones managed using ecosystem-based approaches",
                "order" => "14.2.1",
                "level" => 2,
                "parent_indicator_id" => 286,
                "description" => null,
                "sdg_id" => 14
            ],
            [
                "id" => 297,
                "name" => "Average marine acidity (pH) measured at agreed suite of representative sampling stations",
                "order" => "14.3.1",
                "level" => 2,
                "parent_indicator_id" => 287,
                "description" => null,
                "sdg_id" => 14
            ],
            [
                "id" => 298,
                "name" => "Proportion of fish stocks within biologically sustainable levels",
                "order" => "14.4.1",
                "level" => 2,
                "parent_indicator_id" => 288,
                "description" => null,
                "sdg_id" => 14
            ],
            [
                "id" => 299,
                "name" => "Coverage of protected areas in relation to marine areas",
                "order" => "14.5.1",
                "level" => 2,
                "parent_indicator_id" => 289,
                "description" => null,
                "sdg_id" => 14
            ],
            [
                "id" => 300,
                "name" => "Progress by countries in the degree of implementation of international instruments aiming to combat illegal, unreported and unregulated fishing",
                "order" => "14.6.1",
                "level" => 2,
                "parent_indicator_id" => 290,
                "description" => null,
                "sdg_id" => 14
            ],
            [
                "id" => 301,
                "name" => "Sustainable fisheries as a percentage of GDP in small island developing States, least developed countries and all countries",
                "order" => "14.7.1",
                "level" => 2,
                "parent_indicator_id" => 291,
                "description" => null,
                "sdg_id" => 14
            ],
            [
                "id" => 302,
                "name" => "Proportion of total research budget allocated to research in the field of marine technology",
                "order" => "14.a.1",
                "level" => 2,
                "parent_indicator_id" => 292,
                "description" => null,
                "sdg_id" => 14
            ],
            [
                "id" => 303,
                "name" => "Progress by countries in the degree of application of a legal/regulatory/policy/institutional framework which recognizes and protects access rights for small-scale fisheries",
                "order" => "14.b.1",
                "level" => 2,
                "parent_indicator_id" => 293,
                "description" => null,
                "sdg_id" => 14
            ],
            [
                "id" => 304,
                "name" => "Number of countries making progress in ratifying, accepting and implementing through legal, policy and institutional frameworks, ocean-related instruments that implement international law, as reflected in the United Nation Convention on the Law of the Sea, for the conservation and sustainable use of the oceans and their resources",
                "order" => "14.c.1",
                "level" => 2,
                "parent_indicator_id" => 294,
                "description" => null,
                "sdg_id" => 14
            ],
            [
                "id" => 305,
                "name" => "Ensure the conservation, restoration and sustainable use of terrestrial and inland freshwater ecosystems and their services, in particular forests, wetlands, mountains and drylands, in line with obligations under international agreements",
                "order" => "15.1",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 15
            ],
            [
                "id" => 306,
                "name" => "Promote the implementation of sustainable management of all types of forests, halt deforestation, restore degraded forests and substantially increase afforestation and reforestation globally",
                "order" => "15.2",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 15
            ],
            [
                "id" => 307,
                "name" => "Combat desertification, restore degraded land and soil, including land affected by desertification, drought and floods, and strive to achieve a land degradation-neutral world",
                "order" => "15.3",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 15
            ],
            [
                "id" => 308,
                "name" => "Ensure the conservation of mountain ecosystems, including their biodiversity, in order to enhance their capacity to provide benefits that are essential for sustainable development",
                "order" => "15.4",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 15
            ],
            [
                "id" => 309,
                "name" => "Take urgent and significant action to reduce the degradation of natural habitats, halt the loss of biodiversity and, by 2020, protect and prevent the extinction of threatened species",
                "order" => "15.5",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 15
            ],
            [
                "id" => 310,
                "name" => "Promote fair and equitable sharing of the benefits arising from the utilization of genetic resources and promote appropriate access to such resources, as internationally agreed",
                "order" => "15.6",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 15
            ],
            [
                "id" => 311,
                "name" => "Take urgent action to end poaching and trafficking of protected species of flora and fauna and address both demand and supply of illegal wildlife products",
                "order" => "15.7",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 15
            ],
            [
                "id" => 312,
                "name" => "Introduce measures to prevent the introduction and significantly reduce the impact of invasive alien species on land and water ecosystems and control or eradicate the priority species",
                "order" => "15.8",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 15
            ],
            [
                "id" => 313,
                "name" => "Integrate ecosystem and biodiversity values into national and local planning, development processes, poverty reduction strategies and accounts",
                "order" => "15.9",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 15
            ],
            [
                "id" => 314,
                "name" => "Mobilize and significantly increase financial resources from all sources to conserve and sustainably use biodiversity and ecosystems",
                "order" => "15.a",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 15
            ],
            [
                "id" => 315,
                "name" => "Mobilize significant resources from all sources and at all levels to finance sustainable forest management and provide adequate incentives to developing countries to advance such management, including for conservation and reforestation",
                "order" => "15.b",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 15
            ],
            [
                "id" => 316,
                "name" => "Enhance global support for efforts to combat poaching and trafficking of protected species, including by increasing the capacity of local communities to pursue sustainable livelihood opportunities",
                "order" => "15.c",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 15
            ],
            [
                "id" => 317,
                "name" => "Forest area as a proportion of total land area",
                "order" => "15.1.1",
                "level" => 2,
                "parent_indicator_id" => 305,
                "description" => null,
                "sdg_id" => 15
            ],
            [
                "id" => 318,
                "name" => "Proportion of important sites for terrestrial and freshwater biodiversity that are covered by protected areas, by ecosystem type",
                "order" => "15.1.2",
                "level" => 2,
                "parent_indicator_id" => 305,
                "description" => null,
                "sdg_id" => 15
            ],
            [
                "id" => 319,
                "name" => "Progress towards sustainable forest management",
                "order" => "15.2.1",
                "level" => 2,
                "parent_indicator_id" => 306,
                "description" => null,
                "sdg_id" => 15
            ],
            [
                "id" => 320,
                "name" => "Proportion of land that is degraded over total land area",
                "order" => "15.3.1",
                "level" => 2,
                "parent_indicator_id" => 307,
                "description" => null,
                "sdg_id" => 15
            ],
            [
                "id" => 321,
                "name" => "Coverage by protected areas of important sites for mountain biodiversity",
                "order" => "15.4.1",
                "level" => 2,
                "parent_indicator_id" => 308,
                "description" => null,
                "sdg_id" => 15
            ],
            [
                "id" => 322,
                "name" => "Mountain Green Cover Index",
                "order" => "15.4.2",
                "level" => 2,
                "parent_indicator_id" => 308,
                "description" => null,
                "sdg_id" => 15
            ],
            [
                "id" => 323,
                "name" => "Red List Index",
                "order" => "15.5.1",
                "level" => 2,
                "parent_indicator_id" => 309,
                "description" => null,
                "sdg_id" => 15
            ],
            [
                "id" => 324,
                "name" => "Number of countries that have adopted legislative, administrative and policy frameworks to ensure fair and equitable sharing of benefits",
                "order" => "15.6.1",
                "level" => 2,
                "parent_indicator_id" => 310,
                "description" => null,
                "sdg_id" => 15
            ],
            [
                "id" => 325,
                "name" => "Proportion of traded wildlife that was poached or illicitly trafficked",
                "order" => "15.7.1",
                "level" => 2,
                "parent_indicator_id" => 311,
                "description" => null,
                "sdg_id" => 15
            ],
            [
                "id" => 326,
                "name" => "Proportion of countries adopting relevant national legislation and adequately resourcing the prevention or control of invasive alien species",
                "order" => "15.8.1",
                "level" => 2,
                "parent_indicator_id" => 312,
                "description" => null,
                "sdg_id" => 15
            ],
            [
                "id" => 327,
                "name" => "Progress towards national targets established in accordance with Aichi Biodiversity Target 2 of the Strategic Plan for Biodiversity 2011-2020",
                "order" => "15.9.1",
                "level" => 2,
                "parent_indicator_id" => 313,
                "description" => null,
                "sdg_id" => 15
            ],
            [
                "id" => 328,
                "name" => "Official development assistance and public expenditure on conservation and sustainable use of biodiversity and ecosystems",
                "order" => "15.a.1",
                "level" => 2,
                "parent_indicator_id" => 314,
                "description" => null,
                "sdg_id" => 15
            ],
            [
                "id" => 329,
                "name" => "Official development assistance and public expenditure on conservation and sustainable use of biodiversity and ecosystems",
                "order" => "15.b.1",
                "level" => 2,
                "parent_indicator_id" => 315,
                "description" => null,
                "sdg_id" => 15
            ],
            [
                "id" => 330,
                "name" => "Proportion of traded wildlife that was poached or illicitly trafficked",
                "order" => "15.c.1",
                "level" => 2,
                "parent_indicator_id" => 316,
                "description" => null,
                "sdg_id" => 15
            ],
            [
                "id" => 331,
                "name" => "Significantly reduce all forms of violence and related death rates everywhere",
                "order" => "16.1",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 16
            ],
            [
                "id" => 332,
                "name" => "End abuse, exploitation, trafficking and all forms of violence against and torture of children",
                "order" => "16.2",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 16
            ],
            [
                "id" => 333,
                "name" => "Promote the rule of law at the national and international levels and ensure equal access to justice for all",
                "order" => "16.3",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 16
            ],
            [
                "id" => 334,
                "name" => "By 2030, significantly reduce illicit financial and arms flows, strengthen the recovery and return of stolen assets and combat all forms of organized crime",
                "order" => "16.4",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 16
            ],
            [
                "id" => 335,
                "name" => "Substantially reduce corruption and bribery in all their forms",
                "order" => "16.5",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 16
            ],
            [
                "id" => 336,
                "name" => "Develop effective, accountable and transparent institutions at all levels",
                "order" => "16.6",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 16
            ],
            [
                "id" => 337,
                "name" => "Ensure responsive, inclusive, participatory and representative decision-making at all levels",
                "order" => "16.7",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 16
            ],
            [
                "id" => 338,
                "name" => "Broaden and strengthen the participation of developing countries in the institutions of global governance",
                "order" => "16.8",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 16
            ],
            [
                "id" => 339,
                "name" => "By 2030, provide legal identity for all, including birth registration",
                "order" => "16.9",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 16
            ],
            [
                "id" => 340,
                "name" => "Ensure public access to information and protect fundamental freedoms, in accordance with national legislation and international agreements",
                "order" => "16.10",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 16
            ],
            [
                "id" => 341,
                "name" => "Strengthen relevant national institutions, including through international cooperation, for building capacity at all levels, in particular in developing countries, to prevent violence and combat terrorism and crime",
                "order" => "16.a",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 16
            ],
            [
                "id" => 342,
                "name" => "Promote and enforce non-discriminatory laws and policies for sustainable development",
                "order" => "16.b",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 16
            ],
            [
                "id" => 343,
                "name" => "Number of victims of intentional homicide per 100,000 population, by sex and age",
                "order" => "16.1.1",
                "level" => 2,
                "parent_indicator_id" => 331,
                "description" => null,
                "sdg_id" => 16
            ],
            [
                "id" => 344,
                "name" => "Conflict-related deaths per 100,000 population, by sex, age and cause",
                "order" => "16.1.2",
                "level" => 2,
                "parent_indicator_id" => 331,
                "description" => null,
                "sdg_id" => 16
            ],
            [
                "id" => 345,
                "name" => "Proportion of population subjected to physical, psychological or sexual violence in the previous 12 months",
                "order" => "16.1.3",
                "level" => 2,
                "parent_indicator_id" => 331,
                "description" => null,
                "sdg_id" => 16
            ],
            [
                "id" => 346,
                "name" => "Proportion of population that feel safe walking alone around the area they live",
                "order" => "16.1.4",
                "level" => 2,
                "parent_indicator_id" => 331,
                "description" => null,
                "sdg_id" => 16
            ],
            [
                "id" => 347,
                "name" => "Proportion of children aged 1-17 years who experienced any physical punishment and/or psychological aggression by caregivers in the past month",
                "order" => "16.2.1",
                "level" => 2,
                "parent_indicator_id" => 332,
                "description" => null,
                "sdg_id" => 16
            ],
            [
                "id" => 348,
                "name" => "Number of victims of human trafficking per 100,000 population, by sex, age and form of exploitation",
                "order" => "16.2.2",
                "level" => 2,
                "parent_indicator_id" => 332,
                "description" => null,
                "sdg_id" => 16
            ],
            [
                "id" => 349,
                "name" => "Proportion of young women and men aged 18-29 years who experienced sexual violence by age 18",
                "order" => "16.2.3",
                "level" => 2,
                "parent_indicator_id" => 332,
                "description" => null,
                "sdg_id" => 16
            ],
            [
                "id" => 350,
                "name" => "Proportion of victims of violence in the previous 12 months who reported their victimization to competent authorities or other officially recognized conflict resolution mechanisms",
                "order" => "16.3.1",
                "level" => 2,
                "parent_indicator_id" => 333,
                "description" => null,
                "sdg_id" => 16
            ],
            [
                "id" => 351,
                "name" => "Unsentenced detainees as a proportion of overall prison population",
                "order" => "16.3.2",
                "level" => 2,
                "parent_indicator_id" => 333,
                "description" => null,
                "sdg_id" => 16
            ],
            [
                "id" => 352,
                "name" => "Total value of inward and outward illicit financial flows (in current United States dollars)",
                "order" => "16.4.1",
                "level" => 2,
                "parent_indicator_id" => 334,
                "description" => null,
                "sdg_id" => 16
            ],
            [
                "id" => 353,
                "name" => "Proportion of seized small arms and light weapons that are recorded and traced, in accordance with international standards and legal instruments",
                "order" => "16.4.2",
                "level" => 2,
                "parent_indicator_id" => 334,
                "description" => null,
                "sdg_id" => 16
            ],
            [
                "id" => 354,
                "name" => "Proportion of persons who had at least one contact with a public official and who paid a bribe to a public official, or were asked for a bribe by those public officials, during the previous 12 months",
                "order" => "16.5.1",
                "level" => 2,
                "parent_indicator_id" => 335,
                "description" => null,
                "sdg_id" => 16
            ],
            [
                "id" => 355,
                "name" => "Proportion of businesses that had at least one contact with a public official and that paid a bribe to a public official, or were asked for a bribe by those public officials during the previous 12 months",
                "order" => "16.5.2",
                "level" => 2,
                "parent_indicator_id" => 335,
                "description" => null,
                "sdg_id" => 16
            ],
            [
                "id" => 356,
                "name" => "Primary government expenditures as a proportion of original approved budget, by sector (or by budget codes or similar)",
                "order" => "16.6.1",
                "level" => 2,
                "parent_indicator_id" => 336,
                "description" => null,
                "sdg_id" => 16
            ],
            [
                "id" => 357,
                "name" => "Proportion of the population satisfied with their last experience of public services",
                "order" => "16.6.2",
                "level" => 2,
                "parent_indicator_id" => 336,
                "description" => null,
                "sdg_id" => 16
            ],
            [
                "id" => 358,
                "name" => "Proportions of positions (by sex, age, persons with disabilities and population groups) in public institutions (national and local legislatures, public service, and judiciary) compared to national distributions",
                "order" => "16.7.1",
                "level" => 2,
                "parent_indicator_id" => 337,
                "description" => null,
                "sdg_id" => 16
            ],
            [
                "id" => 359,
                "name" => "Proportion of population who believe decision making is inclusive and responsive, by sex, age, disability and population group",
                "order" => "16.7.2",
                "level" => 2,
                "parent_indicator_id" => 337,
                "description" => null,
                "sdg_id" => 16
            ],
            [
                "id" => 360,
                "name" => "Proportion of members and voting rights of developing countries in international organizations",
                "order" => "16.8.1",
                "level" => 2,
                "parent_indicator_id" => 338,
                "description" => null,
                "sdg_id" => 16
            ],
            [
                "id" => 361,
                "name" => "Proportion of children under 5 years of age whose births have been registered with a civil authority, by age",
                "order" => "16.9.1",
                "level" => 2,
                "parent_indicator_id" => 339,
                "description" => null,
                "sdg_id" => 16
            ],
            [
                "id" => 362,
                "name" => "Number of verified cases of killing, kidnapping, enforced disappearance, arbitrary detention and torture of journalists, associated media personnel, trade unionists and human rights advocates in the previous 12 months",
                "order" => "16.10.1",
                "level" => 2,
                "parent_indicator_id" => 340,
                "description" => null,
                "sdg_id" => 16
            ],
            [
                "id" => 363,
                "name" => "Number of countries that adopt and implement constitutional, statutory and/or policy guarantees for public access to information",
                "order" => "16.10.2",
                "level" => 2,
                "parent_indicator_id" => 340,
                "description" => null,
                "sdg_id" => 16
            ],
            [
                "id" => 364,
                "name" => "Existence of independent national human rights institutions in compliance with the Paris Principles",
                "order" => "16.a.1",
                "level" => 2,
                "parent_indicator_id" => 341,
                "description" => null,
                "sdg_id" => 16
            ],
            [
                "id" => 365,
                "name" => "Proportion of population reporting having personally felt discriminated against or harassed in the previous 12 months on the basis of a ground of discrimination prohibited under international human rights law",
                "order" => "16.b.1",
                "level" => 2,
                "parent_indicator_id" => 342,
                "description" => null,
                "sdg_id" => 16
            ],
            [
                "id" => 366,
                "name" => "Strengthen domestic resource mobilization, including through international support to developing countries, to improve domestic capacity for tax and other revenue collection",
                "order" => "17.1",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 17
            ],
            [
                "id" => 367,
                "name" => "Developed countries to implement fully their official development assistance commitments, including the commitment by many developed countries to achieve the target of 0.7 per cent of ODA/GNI to developing countries and 0.15 to 0.20 per cent of ODA/GNI to least developed countries, ODA providers are encouraged to consider setting a target to provide at least 0.20 per cent of ODA/GNI to least developed countries",
                "order" => "17.2",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 17
            ],
            [
                "id" => 368,
                "name" => "Mobilize additional financial resources for developing countries from multiple sources",
                "order" => "17.3",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 17
            ],
            [
                "id" => 369,
                "name" => "Assist developing countries in attaining long-term debt sustainability through coordinated policies aimed at fostering debt financing, debt relief and debt restructuring, as appropriate, and address the external debt of highly indebted poor countries to reduce debt distress",
                "order" => "17.4",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 17
            ],
            [
                "id" => 370,
                "name" => "Adopt and implement investment promotion regimes for least developed countries",
                "order" => "17.5",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 17
            ],
            [
                "id" => 371,
                "name" => "Enhance North-South, South-South and triangular regional and international cooperation on and access to science, technology and innovation and enhance knowledge sharing on mutually agreed terms, including through improved coordination among existing mechanisms, in particular at the United Nations level, and through a global technology facilitation mechanism",
                "order" => "17.6",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 17
            ],
            [
                "id" => 372,
                "name" => "Promote the development, transfer, dissemination and diffusion of environmentally sound technologies to developing countries on favourable terms, including on concessional and preferential terms, as mutually agreed",
                "order" => "17.7",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 17
            ],
            [
                "id" => 373,
                "name" => "Fully operationalize the technology bank and science, technology and innovation capacity-building mechanism for least developed countries by 2017 and enhance the use of enabling technology, in particular information and communications technology",
                "order" => "17.8",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 17
            ],
            [
                "id" => 374,
                "name" => "Enhance international support for implementing effective and targeted capacity-building in developing countries to support national plans to implement all the Sustainable Development Goals, including through North-South, South-South and triangular cooperation",
                "order" => "17.9",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 17
            ],
            [
                "id" => 375,
                "name" => "Promote a universal, rules-based, open, non-discriminatory and equitable multilateral trading system under the World Trade Organization, including through the conclusion of negotiations under its Doha Development Agenda",
                "order" => "17.10",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 17
            ],
            [
                "id" => 376,
                "name" => "Significantly increase the exports of developing countries, in particular with a view to doubling the least developed countries share of global exports by 2020",
                "order" => "17.11",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 17
            ],
            [
                "id" => 377,
                "name" => "Realize timely implementation of duty-free and quota-free market access on a lasting basis for all least developed countries, consistent with World Trade Organization decisions, including by ensuring that preferential rules of origin applicable to imports from least developed countries are transparent and simple, and contribute to facilitating market access",
                "order" => "17.12",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 17
            ],
            [
                "id" => 378,
                "name" => "Enhance global macroeconomic stability, including through policy coordination and policy coherence",
                "order" => "17.13",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 17
            ],
            [
                "id" => 379,
                "name" => "Enhance policy coherence for sustainable development",
                "order" => "17.14",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 17
            ],
            [
                "id" => 380,
                "name" => "Respect each country s policy space and leadership to establish and implement policies for poverty eradication and sustainable development",
                "order" => "17.15",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 17
            ],
            [
                "id" => 381,
                "name" => "Enhance the global partnership for sustainable development, complemented by multi-stakeholder partnerships that mobilize and share knowledge, expertise, technology and financial resources, to support the achievement of the Sustainable Development Goals in all countries, in particular developing countries",
                "order" => "17.16",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 17
            ],
            [
                "id" => 382,
                "name" => "Encourage and promote effective public, public-private and civil society partnerships, building on the experience and resourcing strategies of partnerships",
                "order" => "17.17",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 17
            ],
            [
                "id" => 383,
                "name" => "By 2020, enhance capacity-building support to developing countries, including for least developed countries and small island developing States, to increase significantly the availability of high-quality, timely and reliable data disaggregated by income, gender, age, race, ethnicity, migratory status, disability, geographic location and other characteristics relevant in national contexts",
                "order" => "17.18",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 17
            ],
            [
                "id" => 384,
                "name" => "By 2030, build on existing initiatives to develop measurements of progress on sustainable development that complement gross domestic product, and support statistical capacity-building in developing countries",
                "order" => "17.19",
                "level" => 1,
                "parent_indicator_id" => null,
                "description" => null,
                "sdg_id" => 17
            ],
            [
                "id" => 385,
                "name" => "Total government revenue as a proportion of GDP, by source",
                "order" => "17.1.1",
                "level" => 2,
                "parent_indicator_id" => 366,
                "description" => null,
                "sdg_id" => 17
            ],
            [
                "id" => 386,
                "name" => "Proportion of domestic budget funded by domestic taxes",
                "order" => "17.1.2",
                "level" => 2,
                "parent_indicator_id" => 366,
                "description" => null,
                "sdg_id" => 17
            ],
            [
                "id" => 387,
                "name" => "Net official development assistance, total and to least developed countries, as a proportion of OECD/DAC donors  gross national income",
                "order" => "17.2.1",
                "level" => 2,
                "parent_indicator_id" => 367,
                "description" => null,
                "sdg_id" => 17
            ],
            [
                "id" => 388,
                "name" => "Foreign direct investments (FDI), official development assistance and South-South Cooperation as a proportion of total domestic budget",
                "order" => "17.3.1",
                "level" => 2,
                "parent_indicator_id" => 368,
                "description" => null,
                "sdg_id" => 17
            ],
            [
                "id" => 389,
                "name" => "Volume of remittances (in United States dollars) as a proportion of total GDP",
                "order" => "17.3.2",
                "level" => 2,
                "parent_indicator_id" => 368,
                "description" => null,
                "sdg_id" => 17
            ],
            [
                "id" => 390,
                "name" => "Debt service as a proportion of exports of goods and services",
                "order" => "17.4.1",
                "level" => 2,
                "parent_indicator_id" => 369,
                "description" => null,
                "sdg_id" => 17
            ],
            [
                "id" => 391,
                "name" => "Number of countries that adopt and implement investment promotion regimes for least developed countries",
                "order" => "17.5.1",
                "level" => 2,
                "parent_indicator_id" => 370,
                "description" => null,
                "sdg_id" => 17
            ],
            [
                "id" => 392,
                "name" => "Number of science and/or technology cooperation agreements and programmes between countries, by type of cooperation",
                "order" => "17.6.1",
                "level" => 2,
                "parent_indicator_id" => 371,
                "description" => null,
                "sdg_id" => 17
            ],
            [
                "id" => 393,
                "name" => "Fixed Internet broadband subscriptions per 100 inhabitants, by speed",
                "order" => "17.6.2",
                "level" => 2,
                "parent_indicator_id" => 371,
                "description" => null,
                "sdg_id" => 17
            ],
            [
                "id" => 394,
                "name" => "Total amount of approved funding for developing countries to promote the development, transfer, dissemination and diffusion of environmentally sound technologies",
                "order" => "17.7.1",
                "level" => 2,
                "parent_indicator_id" => 372,
                "description" => null,
                "sdg_id" => 17
            ],
            [
                "id" => 395,
                "name" => "Proportion of individuals using the Internet",
                "order" => "17.8.1",
                "level" => 2,
                "parent_indicator_id" => 373,
                "description" => null,
                "sdg_id" => 17
            ],
            [
                "id" => 396,
                "name" => "Dollar value of financial and technical assistance (including through North-South, South-South and triangular cooperation) committed to developing countries",
                "order" => "17.9.1",
                "level" => 2,
                "parent_indicator_id" => 374,
                "description" => null,
                "sdg_id" => 17
            ],
            [
                "id" => 397,
                "name" => "Worldwide weighted tariff-average",
                "order" => "17.10.1",
                "level" => 2,
                "parent_indicator_id" => 375,
                "description" => null,
                "sdg_id" => 17
            ],
            [
                "id" => 398,
                "name" => "Developing countries  and least developed countries  share of global exports",
                "order" => "17.11.1",
                "level" => 2,
                "parent_indicator_id" => 376,
                "description" => null,
                "sdg_id" => 17
            ],
            [
                "id" => 399,
                "name" => "Average tariffs faced by developing countries, least developed countries and small island developing States",
                "order" => "17.12.1",
                "level" => 2,
                "parent_indicator_id" => 377,
                "description" => null,
                "sdg_id" => 17
            ],
            [
                "id" => 400,
                "name" => "Macroeconomic Dashboard",
                "order" => "17.13.1",
                "level" => 2,
                "parent_indicator_id" => 378,
                "description" => null,
                "sdg_id" => 17
            ],
            [
                "id" => 401,
                "name" => "Number of countries with mechanisms in place to enhance policy coherence of sustainable development",
                "order" => "17.14.1",
                "level" => 2,
                "parent_indicator_id" => 379,
                "description" => null,
                "sdg_id" => 17
            ],
            [
                "id" => 402,
                "name" => "Extent of use of country-owned results frameworks and planning tools by providers of development cooperation",
                "order" => "17.15.1",
                "level" => 2,
                "parent_indicator_id" => 380,
                "description" => null,
                "sdg_id" => 17
            ],
            [
                "id" => 403,
                "name" => "Number of countries reporting progress in multi-stakeholder development effectiveness monitoring frameworks that support the achievement of the sustainable development goals",
                "order" => "17.16.1",
                "level" => 2,
                "parent_indicator_id" => 381,
                "description" => null,
                "sdg_id" => 17
            ],
            [
                "id" => 404,
                "name" => "Amount of United States dollars committed to public-private and civil society partnerships",
                "order" => "17.17.1",
                "level" => 2,
                "parent_indicator_id" => 382,
                "description" => null,
                "sdg_id" => 17
            ],
            [
                "id" => 405,
                "name" => "Proportion of sustainable development indicators produced at the national level with full disaggregation when relevant to the target, in accordance with the Fundamental Principles of Official Statistics",
                "order" => "17.18.1",
                "level" => 2,
                "parent_indicator_id" => 383,
                "description" => null,
                "sdg_id" => 17
            ],
            [
                "id" => 406,
                "name" => "Number of countries that have national statistical legislation that complies with the Fundamental Principles of Official Statistics",
                "order" => "17.18.2",
                "level" => 2,
                "parent_indicator_id" => 383,
                "description" => null,
                "sdg_id" => 17
            ],
            [
                "id" => 407,
                "name" => "Number of countries with a national statistical plan that is fully funded and under implementation, by source of funding",
                "order" => "17.18.3",
                "level" => 2,
                "parent_indicator_id" => 383,
                "description" => null,
                "sdg_id" => 17
            ],
            [
                "id" => 408,
                "name" => "Dollar value of all resources made available to strengthen statistical capacity in developing countries",
                "order" => "17.19.1",
                "level" => 2,
                "parent_indicator_id" => 384,
                "description" => null,
                "sdg_id" => 17
            ],
            [
                "id" => 409,
                "name" => "Proportion of countries that (a) have conducted at least one population and housing census in the last 10 years, and (b) have achieved 100 per cent birth registration and 80 per cent death registration",
                "order" => "17.19.2",
                "level" => 2,
                "parent_indicator_id" => 384,
                "description" => null,
                "sdg_id" => 17
            ],

        ];

        DB::table('indicators')->insert($indicators);
    }
}
